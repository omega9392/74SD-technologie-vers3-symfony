<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route; 
use App\Classe\Cart;
use App\Entity\Commande; 
use App\Form\CommandeType;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Request;  


class CommandeController extends AbstractController
{
    /**
     * @Route("/commandes", name="commande_liste")
     */
    public function listeCommandes(): Response
    {
        $commandes = $this->getDoctrine()->getRepository(Commande::class)->findAll();

        return $this->render('commande/liste.html.twig', [
            'commandes' => $commandes,
        ]);
    }

    /**
     * @Route("/commandes/creer", name="commande_creer")
     */
    public function creerCommande(Request $request,Cart $cart): Response
    {

        $commande = new Commande();

        $form = $this->createForm(CommandeType::class, $commande);

        $form->handleRequest($request); 
            if ($form->isSubmitted() && $form->isValid()) {
                $carts = $cart->getFullCart();
                $data=$form->getData();
                $commande->setCart($carts);

                // Enregistrer la commande en base de données
                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($commande);
                $entityManager->persist($data);
                $entityManager->flush();
                // Rediriger vers la liste des commandes
                $cart->remove();
                return $this->redirectToRoute('app_Accueil');
            }
        return $this->render('commande/creer.html.twig', [
            'form' => $form->createView(),
        ]);
       
    }


    /**
    * @Route("/commande/{id}", name="user_commande_liste", methods={"GET"})
    */
    public function index(Commande $commande, ProduitRepository $produitrepository )
    {
       
        $user_cart = $commande->getCart();
        //dd($user_cart);
        $cartComplete = [];

        if ($user_cart) {
            foreach ($user_cart as $id => $quantity) {
                // dd($quantity['produit']);
         
                   
                    $produit_object = $produitrepository->findOneById($quantity['produit']);
                    // if (!$produit_object) {
                    //     $this->delete($id);
                    //     continue;
                    // }
    
                    $cartComplete[] = [
                        'produit' => $produit_object,
                        'quantity' => $quantity
                    ];
            
                  
            }
       
        }

        // dd($cartComplete);

        return $this->render('commande/user_commande.html.twig', [
            'commandes' => $cartComplete,
            'commande_user' => $commande
        ]);
    }

}
