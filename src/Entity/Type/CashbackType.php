<?php

namespace App\Entity\Type;

use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class CashbackType
{
    public const PERCENTAGE = 'Процентный кэшбек';
    public const FIXED = 'Фиксированный кэшбек';
    public const NEXT_PURCHASE = 'Кэшбек на следующую покупку';

    public const CHOICES = [
        self::PERCENTAGE,
        self::FIXED,
        self::NEXT_PURCHASE,
    ];
    public static function choices(): array
    {
        return [
            self::PERCENTAGE => 'Процентный кэшбек',
            self::FIXED => 'Фиксированный кэшбек',
            self::NEXT_PURCHASE => 'Кэшбек на следующую покупку',
        ];
    }
}