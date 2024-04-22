<?php

namespace App\Controller\Admin;

use App\Entity\ActionCondition;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ActionConditionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ActionCondition::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            IntegerField::new('source'),
            IntegerField::new('partnerCode'),
            IntegerField::new('partnerType'),
            ArrayField::new('productCode'),
            TextField::new('productCategory'),
            ArrayField::new('placement'),
            IntegerField::new('activityCode'),
            ArrayField::new('dataSource'),
            ArrayField::new('pageUnit'),
            ArrayField::new('payFromName'),
        ];
    }
}
