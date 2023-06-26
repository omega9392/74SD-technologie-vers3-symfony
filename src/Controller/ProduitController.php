<?php

namespace App\Controller;

use App\Entity\Produit;
use App\Entity\Category;
use App\Form\ProduitType;
use App\Repository\ProduitRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;



class ProduitController extends AbstractController
{
    /**
     * @Route("/produit", name="app_produit_index" , methods={"GET"})
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('produit/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
 
    }
       /**
    * @Route("/produit/new", name="app_produit_new", methods={"GET", "POST"})
    */
   public function new(Request $request, ProduitRepository $produitRepository): Response
   {
       $produit = new Produit();
       $form = $this->createForm(ProduitType::class, $produit);
       $form->handleRequest($request);


       if ($form->isSubmitted() && $form->isValid()) {


             /** @var UploadedFile $photo */
               $photo = $form->get('photo')->getData();


               if ($photo) {
                   $photoFilename = uniqid() . '.' . $photo->guessExtension();


                   try {
                       $photo->move($this->getParameter('photo_directory'), $photoFilename);
                   } catch (FileException $e) {
                       // handle exception
                   }


                   $produit->setPhoto($photoFilename);
               }






           $produitRepository->add($produit, true);


           return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
       }


       return $this->renderForm('produit/new.html.twig', [
           'produit' => $produit,
           'form' => $form,
       ]);
   }
/**
    * @Route("/{id}/show", name="app_produit_show", methods={"GET"})
    */
    public function show(Produit $produit): Response
    {
        return $this->render('produit/show.html.twig', ['produit' => $produit,]);
    }
  /**
    * @Route("/{id}/edit", name="app_produit_edit", methods={"GET", "POST"})
    */
    public function edit(Request $request, Produit $produit, ProduitRepository $produitRepository): Response
    {
        $form = $this->createForm(ProduitType::class, $produit);
        $form->handleRequest($request);
 
 
        if ($form->isSubmitted() && $form->isValid()) {
 
 
                 /** @var UploadedFile $photo */
                 $photo = $form->get('photo')->getData();
 
 
                 if ($photo) {
                     $photoFilename = uniqid() . '.' . $photo->guessExtension();
                     try {
                         $photo->move($this->getParameter('photo_directory'), $photoFilename);
                     } catch (FileException $e) {
                         // handle exception
                     }
                     $produit->setPhoto($photoFilename);
                 }
 
 
            $produitRepository->add($produit, true);
 
 
            return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
        }
 
 
        return $this->renderForm('produit/edit.html.twig', [
            'produit' => $produit,
            'form' => $form,
        ]);
    }
   /**
    * @Route("/{id}/delete", name="app_produit_delete", methods={"POST"})
    */
    public function delete(Request $request, Produit $produit, ProduitRepository $produitRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$produit->getId(), $request->request->get('_token'))) {
            $produitRepository->remove($produit, true);
        }
 
 
        return $this->redirectToRoute('app_produit_index', [], Response::HTTP_SEE_OTHER);
    }
 
}
