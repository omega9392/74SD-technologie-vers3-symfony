<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComadMcController extends AbstractController
{
    /**
     * @Route("/comad/mc", name="app_comad_mc")
     */
    public function index(): Response
    {
        return $this->render('comad_mc/index.html.twig', [
            'controller_name' => 'ComadMcController',
        ]);
    }
}
