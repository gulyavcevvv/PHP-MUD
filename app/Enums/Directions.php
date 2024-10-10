<?php

namespace App\Enums;

enum Direction: int
{
    case NORTH = 0;
    case EAST = 1;
    case SOUTH = 2;
    case WEST = 3;
    case UP = 4;
    case DOWN = 5;

    function label($value)
    {
        return match($this) {
            static::NORTH =>  'север',
            static::EAST => 'восток',
            static::SOUTH => 'юг',
            static::WEST => 'запад',
            static::UP => 'вверх',
            static::DOWN => 'вниз',
        };
    }
}
