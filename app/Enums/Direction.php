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

    function label()
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

    public static function findLabel($label): static
    {
        $label = mb_strtoupper(trim($label));

        foreach (self::cases() as $value) {
            if (mb_strtoupper($value->label()) == $label) {
                return $value;
            }
        }

        throw new \Exception("Error Processing Request", 1);
        
    }
}
