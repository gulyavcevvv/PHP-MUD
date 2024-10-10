<?php

namespace App\Enums;

enum Movement: int
{
    case WALK = 0; // Пришел/ушел
    case RUN = 1; // Прибежал/убежал
    case CRAWL = 2; // Приполз/уполз
    case JUMP = 3; // Прискакал/ускакал
    case ROLL = 4; // Прикатился/укатился
    case RIDE = 5; // Приехал/уехал
    case LEAP = 6; // Припрыгал/упрыгал
    case SWIM = 7; // Приплыл/уплыл

    function label($value)
    {
        return match ($this) {
            static::WALK => 'Пришел/ушел',
            static::RUN => 'Прибежал/убежал',
            static::CRAWL => 'Приполз/уполз',
            static::JUMP => 'Прискакал/ускакал',
            static::ROLL => 'Прикатился/укатился',
            static::RIDE => 'Приехал/уехал',
            static::LEAP => 'Припрыгал/упрыгал',
            static::SWIM => 'Приплыл/уплыл',
        };
    }
}
