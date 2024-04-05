<?php

namespace App\Entity\Enum;

enum PromoType: string
{
    case Cashback = 'Выплаты кешбека';
    case PurchaseBonus = 'Бонусы за покупку';
    case Coupon = 'Купон';
}