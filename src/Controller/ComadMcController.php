<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProduitRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComadMcController extends AbstractController
{
    /**
     * @Route("/comad/mc", name="app_comad_mc")
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('comad_mc/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }
}
