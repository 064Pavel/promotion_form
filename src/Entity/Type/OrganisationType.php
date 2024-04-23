<?php

namespace App\Entity\Type;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class OrganisationType
{
    public const TINKOFF = 'Тинькофф';
    public const SBERBANK = 'Сбербанк';
    public const ALFABANK = 'Альфабанк';

    public const CHOICES = [
        self::TINKOFF,
        self::SBERBANK,
        self::ALFABANK,
    ];

    public static function choices(): array
    {
        return [
            self::TINKOFF => 'Тинькофф',
            self::SBERBANK => 'Сбербанк',
            self::ALFABANK => 'Альфабанк',
        ];
    }
}
