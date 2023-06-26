<?php

namespace App\Controller\Admin;

use App\Entity\Produit;

use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\MoneyField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;

class ProduitCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Produit::class;
    }

    public function configureFields(string $pageName): iterable
    {
       $image = ImageField::new('photo')->setBasePath('uploads/photos/')
        ->setUploadDir('public/uploads/photos/')
        ->setUploadedFileNamePattern('[randomhash].[extension]')
        ->setRequired(false);
          return [

               TextField::new('nom'),
               
               TextareaField::new('description'),
               //TextField::new('categorie'),
               TextField::new('categorie')
                    ->setFormType(ChoiceType::class)
                    ->setFormTypeOptions([
                        'choices' => [
                            'Montres' => 'Montres',
                            'Ordinateurs' => 'Ordinateurs',
                            'Batteries' => 'Batteries',
                            'Port-USB'=> 'Port-USB',
                            'Tablettes'=> 'Tablettes',
                            'Smartphones'=> 'Smartphones',
                            'Oreillettes'=> 'Oreillettes',
                            'Extras'=> 'Extras',
                            // Ajoutez d'autres catégories si nécessaire
                        ],
                    ]),
               MoneyField::new('prix')->setCurrency('EUR'),

               $image,
            

          ];
        

           
        
    }
    
    
}
