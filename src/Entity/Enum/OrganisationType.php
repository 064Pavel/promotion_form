<?php

namespace App\Entity\Enum;

enum OrganisationType: string
{
    case Tinkoff = 'Тинькофф';
    case Sberbank = 'Сбербанк';
    case Alfabank = 'Альфабанк';
}
