<?php

namespace App\Enums;

enum Liquid: int
{
    case WATER = 0; // Вода
    case BEER = 1; // Пиво
    case WINE = 2; // Вино
    case ALE = 3; // Эль
    case VODKA = 4; // Водка
    case JUICE = 5; // Сок
    case ALCOHOL = 6; // Спирт
    case SLIME = 7; // Слизь
    case MILK = 8; // Молоко
    case TEA = 9; // Чай
    case COFFEE = 10; // Кофе
    case BLOOD = 11; // Кровь
    case SALTWATER = 12; // Соленая вода

    function label($value)
    {
        return match ($this) {
            static::WATER => 'Вода',
            static::BEER => 'Пиво',
            static::WINE => 'Вино',
            static::ALE => 'Эль',
            static::VODKA => 'Водка',
            static::JUICE => 'Сок',
            static::ALCOHOL => 'Спирт',
            static::SLIME => 'Слизь',
            static::MILK => 'Молоко',
            static::TEA => 'Чай',
            static::COFFEE => 'Кофе',
            static::BLOOD => 'Кровь',
            static::SALTWATER => 'Соленая вода',
        };
    }
}
