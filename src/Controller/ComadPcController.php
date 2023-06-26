<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProduitRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComadPcController extends AbstractController
{
    /**
     * @Route("/comad/pc", name="app_comad_pc")
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('comad_pc/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }
}
