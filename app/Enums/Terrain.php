<?php

namespace App\Enums;

enum Terrain: int
{
    case ROOM = 0; // Внутри помещения
    case CITY = 1; // Улицы города
    case FIELD = 2; // Открытое поле
    case FOREST = 3; // Густой лес
    case HILLS = 4; // Низкие холмы
    case MOUNTAINS = 5; // Высокие горы
    case SHALLOW_WATER = 6; // Вода, можно плавать
    case DEEP_WATER = 7; // Вода, нельзя плавать
    case UNDERWATER = 8; // Под водой
    case AIR = 9; // В воздухе
    case ROAD = 10; // Дальняя дорога
    case SWAMP = 11; // Болото и т.п. сырая тяжелая местность
    case THIN_FOREST = 12; // Почти как ПОЛЕ, с легкими эфектами ЛЕСа
    case JUNGLE = 13; // Очень густой лес, не проехать верхом, сложнее освещать соседние комнаты
    case TREE = 14; // На дереве, на мачте корабля и в т.п. ситуациях, где узко, неустойчиво и высоко

    function label($value)
    {
        return match ($this) {
            static::ROOM => 'Внутри помещения',
            static::CITY => 'Улицы города',
            static::FIELD => 'Открытое поле',
            static::FOREST => 'Густой лес',
            static::HILLS => 'Низкие холмы',
            static::MOUNTAINS => 'Высокие горы',
            static::SHALLOW_WATER => 'Вода, можно плавать',
            static::DEEP_WATER => 'Вода, нельзя плавать',
            static::UNDERWATER => 'Под водой',
            static::AIR => 'В воздухе',
            static::ROAD => 'Дальняя дорога',
            static::SWAMP => 'Болото и т.п. сырая тяжелая местность',
            static::THIN_FOREST => 'Почти как ПОЛЕ, с легкими эфектами ЛЕСа',
            static::JUNGLE => 'Очень густой лес, не проехать верхом, сложнее освещать соседние комнаты',
            static::TREE => 'На дереве, на мачте корабля и в т.п. ситуациях, где узко, неустойчиво и высоко',
        };
    }
}
