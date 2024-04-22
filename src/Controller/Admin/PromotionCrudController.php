<?php

namespace App\Controller\Admin;

use App\Entity\Bonus;
use App\Entity\Type\CashbackType;
use App\Entity\Type\OrganisationType;
use App\Entity\Type\PromoType;
use App\Entity\Promotion;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ChoiceField;
use EasyCorp\Bundle\EasyAdminBundle\Field\CollectionField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\NumberField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PromotionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Promotion::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            TextField::new('name'),
            TextEditorField::new('description'),
            TextField::new('partnerName'),
            TextField::new('partnerLogo'),
            BooleanField::new('isCustom'),
            BooleanField::new('isReferral'),
            BooleanField::new('isRandom'),
            DateTimeField::new('randomSelectionDate'),
            BooleanField::new('isGeneralPromoCode'),
            ChoiceField::new('promoType')->setChoices(PromoType::choices()),
            ChoiceField::new('cashbackType')->setChoices(CashbackType::choices()),
            NumberField::new('amountReward'),
            NumberField::new('percentAmount'),
            TextField::new('landingPageLink'),
            TextField::new('ruleLink'),
            DateTimeField::new('promoStartDate'),
            DateTimeField::new('promoFinishDate'),
            ChoiceField::new('paymentOrganisation')->setChoices(OrganisationType::choices()),
            BooleanField::new('isActive'),
            CollectionField::new('bonuses', 'bonus')->useEntryCrudForm(),
            CollectionField::new('actions')->useEntryCrudForm(),
            CollectionField::new('generalPromoCodes')->useEntryCrudForm(),
            CollectionField::new('restrictions')->useEntryCrudForm(),
        ];
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Promotion')
            ->setEntityLabelInPlural('Promotions')
            ->setSearchFields(['id', 'title', 'description'])
            ->setDefaultSort(['id' => 'DESC']);
    }
}

