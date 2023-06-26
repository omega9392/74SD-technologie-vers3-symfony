<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use App\Repository\ProduitRepository;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComadUsbController extends AbstractController
{
    /**
     * @Route("/comad/usb", name="app_comad_usb")
     */
    public function index(ProduitRepository $produitRepository): Response
    {
        return $this->render('comad_usb/index.html.twig', [
            'produits' => $produitRepository->findAll(),
        ]);
    }
}
