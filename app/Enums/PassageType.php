<?php

namespace App\Enums;

enum PassageType: int
{
    case DOOR = 1; // Дверь
    case GATE = 2; // Ворота
    case WINDOW = 3; // Окно
    case HATCH = 4; // Люк
    case PORTAL = 5; // Портал
    case GATE = 6; // Калитка
    case GRILLE = 7; // Решетка
    case DOORLET = 8; // Дверца
    case SLAB = 9; // Плита
    case DOORS = 10; // Двери
    case HOLE = 11; // Дыра
    case LOUGH = 12; // Лаз
    case PASSAGE = 13; // Проход
    case BREACH = 14; // Пролом

    function label()
    {
        return match ($this) {
            static::DOOR => 'Дверь',
            static::GATE => 'Ворота',
            static::WINDOW => 'Окно',
            static::HATCH => 'Люк',
            static::PORTAL => 'Портал',
            static::GATE => 'Калитка',
            static::GRILLE => 'Решетка',
            static::DOORLET => 'Дверца',
            static::SLAB => 'Плита',
            static::DOORS => 'Двери',
            static::HOLE => 'Дыра',
            static::LOUGH => 'Лаз',
            static::PASSAGE => 'Проход',
            static::BREACH => 'Пролом',
        };
    }
}
