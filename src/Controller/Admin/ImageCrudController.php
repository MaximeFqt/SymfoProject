<?php

namespace App\Controller\Admin;

use App\Entity\Image;
use App\Field\VichImageField;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Image::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('nom'),
            ImageField::new('url')->setBasePath('/img')->hideOnForm(),
            VichImageField::new('imageFile')->hideOnIndex()->hideOnDetail()
        ];
    }

}
