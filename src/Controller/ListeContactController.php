<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class ListeContactController extends AbstractController
{
    /**
     * @Route("/liste/contact", name="app_liste_contact")
     */
    public function index(): Response
    {
        return $this->render('liste_contact/index.html.twig', [
            'controller_name' => 'ListeContactController',
        ]);
    }
}
