<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProduitRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComadSmController extends AbstractController
{
    /**
     * @Route("/comad/sm", name="app_comad_sm")
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('comad_sm/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }
}
