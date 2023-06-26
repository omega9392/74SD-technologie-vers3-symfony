<?php

namespace App\Controller\Admin;

use App\Entity\Commande;
use App\Entity\User;
use App\Entity\Contact;
use App\Entity\Produit;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{
    /**
     * @Route("/admin", name="admin")
     */
    public function index(): Response
    {
        return parent::index();
    }
    

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('74SD-Tecnologie');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToCrud('utilisateurs', 'fas fa-user', User::class);        
        yield MenuItem::linkToCrud('contacts', 'fas fa-list', Contact::class);
        yield MenuItem::linkToCrud('produits', 'fas fa-tag', Produit::class);   
        yield MenuItem::linkToCrud('commandes', 'fas fa-truck', Commande::class);           
       

    }
    
}
