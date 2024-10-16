<?php

namespace App\Enums;

enum Gender: int
{
    case NEUTER = 0; // Средний род
    case MALE = 1; // Мужской род
    case FEMALE = 2; // Женский род
    case PLURAL = 3; // Множественное число

    function label()
    {
        return match ($this) {
            static::NEUTER => 'Средний род',
            static::MALE => 'Мужской род',
            static::FEMALE => 'Женский род',
            static::PLURAL => 'Множественное число',
        };
    }
}
