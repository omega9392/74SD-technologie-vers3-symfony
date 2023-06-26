<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProduitRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="app_Accueil")
     */
    public function index(ProduitRepository $produitRepository): Response
    {
    //    dd( $produitRepository->findAll());
        return $this->render('accueil/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }
}
