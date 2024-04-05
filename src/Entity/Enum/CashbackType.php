<?php

namespace App\Entity\Enum;

enum CashbackType: string
{
    case Percentage = 'Процентный кэшбек';
    case Fixed = 'Фиксированный кэшбек';
    case NextPurchase = 'Кэшбек на следующую покупку';
}