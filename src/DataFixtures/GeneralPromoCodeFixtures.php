<?php

namespace App\DataFixtures;

use App\Entity\GeneralPromoCode;
use App\Tool\FakerToolsInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class GeneralPromoCodeFixtures extends Fixture
{
    public function __construct(private FakerToolsInterface $fakerTools, )
    {
    }


    public function load(ObjectManager $manager)
    {
        for ($i = 0; $i < 5; $i++) {
            $generalPromoCode = new GeneralPromoCode();
        }
    }
}