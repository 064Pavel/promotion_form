<?php

namespace App\Entity\Type;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Embeddable]
class PromoType
{
    public const CASHBACK = 'Выплаты кешбека';
    public const PURCHASE_BONUS = 'Бонусы за покупку';
    public const COUPON = 'Купон';

    public const CHOICES = [
        self::CASHBACK,
        self::PURCHASE_BONUS,
        self::COUPON,
    ];
    public static function choices(): array
    {
        return [
            self::CASHBACK => 'Выплаты кешбека',
            self::PURCHASE_BONUS => 'Бонусы за покупку',
            self::COUPON => 'Купон',
        ];
    }
}
