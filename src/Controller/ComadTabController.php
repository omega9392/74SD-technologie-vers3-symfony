<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProduitRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComadTabController extends AbstractController
{
    /**
     * @Route("/comad/tab", name="app_comad_tab")
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('comad_tab/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }
}
