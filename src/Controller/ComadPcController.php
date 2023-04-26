<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComadPcController extends AbstractController
{
    /**
     * @Route("/comad/pc", name="app_comad_pc")
     */
    public function index(): Response
    {
        return $this->render('comad_pc/index.html.twig', [
            'controller_name' => 'ComadPcController',
        ]);
    }
}
