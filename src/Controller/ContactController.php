<?php

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactType;
use App\Repository\ContactRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ContactController extends AbstractController
{
   

   /**
    * @Route("/contact", name="app_contact")
    */
    public function index(Request $request,  EntityManagerInterface $entityManager)
    {
        $form = $this->createForm(ContactType::class);
        $form->handleRequest($request);
 
 
        if ($form->isSubmitted() && $form->isValid()) {
            $contact = $form->getData();
            
            $entityManager->persist($contact);
            $entityManager->flush();
           
 
 
            $this->addFlash('message', 'Votre message a été transmis, nous vous répondrons dans les meilleurs délais.'); // Permet un message flash de renvoi
       
        }
        return $this->render('contact/index.html.twig',
        ['form' => $form->createView()]
    );
     
    }
  /**
    * @Route("/contacts", name="contact_list")
    */
    public function listContacts()
    {
        $repository = $this->getDoctrine()->getRepository(Contact::class);
        $contacts = $repository->findAll();
 
 
        return $this->render('liste_contact/index.html.twig', ['contacts' => $contacts,]);
     }
 /**
    * @Route("/contact/edit/{id}", name="contact_edit", requirements={"id"="\d+"})
    */
   public function edit(Request $request, Contact $contact): Response
   {
       $form = $this->createForm(ContactType::class, $contact);
       $form->handleRequest($request);


       if ($form->isSubmitted() && $form->isValid()) {
           $entityManager = $this->getDoctrine()->getManager();
           $entityManager->flush();


           return $this->redirectToRoute('contact_list');
       }


       return $this->render('contact/edit.html.twig', [
           'form' => $form->createView(),
       ]);
   }


   /**
    * @Route("/contact/delete/{id}", name="contact_delete", requirements={"id"="\d+"})
    */
   public function delete(Contact $contact): Response
   {
       $entityManager = $this->getDoctrine()->getManager();
       $entityManager->remove($contact);
       $entityManager->flush();


       return $this->redirectToRoute('contact_list');
   }

}
