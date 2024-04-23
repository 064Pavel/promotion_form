<?php

namespace App\DataFixtures;

use App\Entity\Bonus;
use App\Tool\FakerToolsInterface;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BonusFixtures extends Fixture
{
    public function __construct(private FakerToolsInterface $fakerTools)
    {
    }

    public function load(ObjectManager $manager)
    {
        $faker = $this->fakerTools->getFaker();

        for ($i = 0; $i < 5; ++$i) {
            $bonus = new Bonus();
            $bonus->setBonusSum($faker->numberBetween(99, 9999));
            $bonus->setBonusNumber($faker->numberBetween(1, 5));
        }
    }
}
