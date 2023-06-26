<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProduitRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComadExController extends AbstractController
{
    /**
     * @Route("/comad/ex", name="app_comad_ex")
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('comad_ex/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }
}
