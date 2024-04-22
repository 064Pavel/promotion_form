<?php

namespace App\Controller\Admin;

use App\Entity\Restriction;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\ArrayField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RestrictionCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Restriction::class;
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')->hideOnForm(),
            IntegerField::new('numberClientParticipation'),
            IntegerField::new('numberClientParticipationProductType'),
            IntegerField::new('numberClientParticipationPartnerCode'),
            BooleanField::new('isLimited'),
            IntegerField::new('amountLimit'),
            ArrayField::new('clientGeo'),
        ];
    }

//    #[ORM\Column]
//    private ?int $numberClientParticipation = null;
//
//    #[ORM\Column]
//    private ?int $numberClientParticipationProductType = null;
//
//    #[ORM\Column]
//    private ?int $numberClientParticipationPartnerCode = null;
//
//    #[ORM\Column]
//    private ?bool $isLimited = null;
//
//    #[ORM\Column]
//    private ?int $amountLimit = null;
//
//    #[ORM\Column(type: Types::ARRAY)]
//    private array $clientGeo = [];
}
