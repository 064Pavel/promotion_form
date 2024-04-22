<?php

namespace App\Tool;

use Faker\Factory;
use Faker\Generator;

class FakerTools implements FakerToolsInterface
{
    public function getFaker(): Generator
    {
        return Factory::create();
    }
}