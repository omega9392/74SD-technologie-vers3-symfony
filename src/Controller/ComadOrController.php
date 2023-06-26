<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProduitRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComadOrController extends AbstractController
{
    /**
     * @Route("/comad/or", name="app_comad_or")
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('comad_or/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }
}
