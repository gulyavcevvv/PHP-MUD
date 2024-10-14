<?php

namespace App\Enums;

enum ResetCondition: int
{
    case Never = 0 ;
    case NoPlayers = 1;
    case Always = 2;

    public function label(): string
    {
        return match($this) {
            static::Never => 'никогда',
            static::NoPlayers => 'когда в области нет игроков,',
            static::Always => 'всегда',
        };
    }
}