<?php

namespace App\Enums;

enum WeaponType: int
{
    case UNK = 0; // Рукопашный бой
    case STAB = 1; // Колющее оружие
    case CUT = 2; // Режущее оружие
    case TWO_HANDED = 3; // Двуручное оружие
    case POLE = 4; // Древковое оружие
    case SLASH = 5; // Рубящее оружие
    case IMPACT = 6; // Ударное оружие
    case RANGED = 7; // Стрелковое оружие
    case STAFF = 15; // Посохи

    function label($value)
    {
        return match ($this) {
            static::UNK => 'Рукопашный бой',
            static::STAB => 'Колющее оружие',
            static::CUT => 'Режущее оружие',
            static::TWO_HANDED => 'Двуручное оружие',
            static::POLE => 'Древковое оружие',
            static::SLASH => 'Рубящее оружие',
            static::IMPACT => 'Ударное оружие',
            static::RANGED => 'Стрелковое оружие',
            static::STAFF => 'Посохи',
        };
    }
}
