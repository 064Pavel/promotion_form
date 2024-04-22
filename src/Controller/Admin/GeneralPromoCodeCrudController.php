<?php

namespace App\Controller\Admin;

use App\Entity\GeneralPromoCode;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class GeneralPromoCodeCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return GeneralPromoCode::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('promoCode'),
            TextField::new('addInfo'),
            DateTimeField::new('timestampExpire'),
            IntegerField::new('promoAmount'),
        ];
    }

}
