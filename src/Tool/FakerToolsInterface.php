<?php

namespace App\Tool;

use Faker\Generator;

interface FakerToolsInterface
{
    public function getFaker(): Generator;
}