<?php

namespace App\Enums;

enum ImpactType: int
{
    case HIT = 0; // УДАРИТЬ
    case STAB = 1; // УКОЛОТЬ
    case CUT = 2; // ПОРЕЗАТЬ
    case SLASH = 3; // ПОЛОСНУТЬ
    case THRUST = 4; // ПРОНЗИТЬ
    case SLASH = 5; // ПОРУБИТЬ
    case CRUSH = 6; // СОКРУШИТЬ
    case SHOOT = 7; // ПРОСТРЕЛИТЬ
    case SCRATCH = 8; // ПОЦАРАПАТЬ
    case WHIP = 9; // ХЛЕСТНУТЬ
    case GORE = 10; // БОДНУТЬ
    case PECK = 11; // КЛЮНУТЬ
    case KICK = 12; // ЛЯГНУТЬ
    case STING = 13; // УЖАЛИТЬ
    case BITE = 14; // УКУСИТЬ
    case SMACK = 15; // СТУКНУТЬ

    function label($value)
    {
        return match ($this) {
            static::HIT => 'УДАРИТЬ',
            static::STAB => 'УКОЛОТЬ',
            static::CUT => 'ПОРЕЗАТЬ',
            static::SLASH => 'ПОЛОСНУТЬ',
            static::THRUST => 'ПРОНЗИТЬ',
            static::SLASH => 'ПОРУБИТЬ',
            static::CRUSH => 'СОКРУШИТЬ',
            static::SHOOT => 'ПРОСТРЕЛИТЬ',
            static::SCRATCH => 'ПОЦАРАПАТЬ',
            static::WHIP => 'ХЛЕСТНУТЬ',
            static::GORE => 'БОДНУТЬ',
            static::PECK => 'КЛЮНУТЬ',
            static::KICK => 'ЛЯГНУТЬ',
            static::STING => 'УЖАЛИТЬ',
            static::BITE => 'УКУСИТЬ',
            static::SMACK => 'СТУКНУТЬ',
        };
    }
}
