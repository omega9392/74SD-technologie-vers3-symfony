<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ComadBeController extends AbstractController
{
    /**
     * @Route("/comad/be", name="app_comad_be")
     */
    public function index(): Response
    {
        return $this->render('comad_be/index.html.twig', [
            'controller_name' => 'ComadBeController',
        ]);
    }
}
