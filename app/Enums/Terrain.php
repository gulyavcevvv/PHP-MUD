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

    function label()
    {
        return match ($this) {
            static::ROOM => 'ПОМЕЩЕНИЕ',
            static::CITY => 'ГОРОД',
            static::FIELD => 'ПОЛЕ',
            static::FOREST => 'ЛЕС',
            static::HILLS => 'ХОЛМЫ',
            static::MOUNTAINS => 'ГОРЫ',
            static::SHALLOW_WATER => 'МЕЛКОВОДЬЕ',
            static::DEEP_WATER => 'ГЛУБОКОВОДЬЕ',
            static::UNDERWATER => 'ПОДВОДОЙ',
            static::AIR => 'ВОЗДУХ',
            static::ROAD => 'ДОРОГА',
            static::SWAMP => 'БОЛОТО',
            static::THIN_FOREST => 'РЕДКИЙЛЕС',
            static::JUNGLE => 'ДЖУНГЛИ',
            static::TREE => 'НАДЕРЕВЕ',
        };
    }
}
