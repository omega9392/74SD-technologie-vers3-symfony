<?php

namespace App\Controller;


use App\Classe\Cart;
use App\Entity\Produit;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CartController extends AbstractController
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        $this->entityManager = $entityManager;
    }
    /**
     * @Route("/mon-panier", name="cart")
     */
    public function index(Cart $cart): Response
    {
        $cartComplete = [];
         
        foreach ($cart->get() as $id => $quantity) {
            $cartComplete[]=[
                'produit' => $this->entityManager->getRepository(Produit::class)->findOneById($id),
                'quantity' => $quantity
            ];
        }
      
        // dd($cartComplete);
        return $this->render('cart/index.html.twig', [
            'cart' => $cartComplete
        ]);
    }

     /**
     * @Route("/cart/add/{id}", name="app_add_to_cart")
     */
    public function add(Cart $cart, $id): Response
    {
        $cart->add($id);
        return $this->redirectToRoute('cart');
    }

     /**
     * @Route("/cart/remove/{id}", name="app_remove_my_cart")
     */
    public function remove(Cart $cart , $id): Response
    {
        $cart->remove($id);

        return $this->redirectToRoute('cart');
    }
    /**
     * @Route("/cart/delete/{id}", name="app_delete_to_cart")
     */
    public function delete(Cart $cart , $id): Response
    {
        
        $cart = $cart->delete($id);
      
        return $this->redirectToRoute('cart');
    }
/**
     * @Route("/cart/decrease/{id}", name="app_decrease_to_cart")
     */
    public function decrease(Cart $cart , $id): Response
    {
        $cart->decrease($id);

        return $this->redirectToRoute('cart');
    }



}
