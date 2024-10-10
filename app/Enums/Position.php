<?php

namespace App\Enums;

enum Position: int
{
    case DEAD = 0; // Мертв
    case WOUNDED = 1; // Ранен
    case STUNNED = 2; // Оглушен
    case ASLEEP = 3; // Спит
    case RESTING = 4; // Отдыхает
    case SITTING = 5; // Сидит
    case STANDING = 6; // Стоит

    function label($value)
    {
        return match ($this) {
            static::DEAD => 'Мертв',
            static::WOUNDED => 'Ранен',
            static::STUNNED => 'Оглушен',
            static::ASLEEP => 'Спит',
            static::RESTING => 'Отдыхает',
            static::SITTING => 'Сидит',
            static::STANDING => 'Стоит',
        };
    }
}
