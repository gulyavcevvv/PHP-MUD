<?php

namespace App\Enums;

enum ShopItemType: int
{
    case LIGHT = 1; // Источник света
    case SCROLL = 2; // Свиток
    case STICK = 3; // Палочка
    case STAFF = 4; // Посох
    case WEAPON = 5; // Оружие
    case TREASURE = 8; // Сокровище
    case ARMOR = 9; // Доспех
    case POTION = 10; // Зелье
    case CLOTHING = 11; // Одеваемый предмет
    case OTHER = 12; // Прочее
    case CONTAINER = 15; // Контейнер
    case NOTE = 16; // Записка
    case VESSEL = 17; // Сосуд
    case KEY = 18; // Ключ
    case FOOD = 19; // Пища
    case MONEY = 20; // Деньги
    case INSTRUMENT = 21; // Письменный прибор
    case BOAT = 22; // Лодка
    case FOUNTAIN = 23; // Фонтан
    case BOOK = 24; // Книга заклинаний или молитвеник
    case BOARD = 25; // Доска объявлений
    case RECEIPT = 26; // Расписка на ездовое животное

    function label($value)
    {
        return match ($this) {
            static::LIGHT => 'Источник света',
            static::SCROLL => 'Свиток',
            static::STICK => 'Палочка',
            static::STAFF => 'Посох',
            static::WEAPON => 'Оружие',
            static::TREASURE => 'Сокровище',
            static::ARMOR => 'Доспех',
            static::POTION => 'Зелье',
            static::CLOTHING => 'Одеваемый предмет',
            static::OTHER => 'Прочее',
            static::CONTAINER => 'Контейнер',
            static::NOTE => 'Записка',
            static::VESSEL => 'Сосуд',
            static::KEY => 'Ключ',
            static::FOOD => 'Пища',
            static::MONEY => 'Деньги',
            static::INSTRUMENT => 'Письменный прибор',
            static::BOAT => 'Лодка',
            static::FOUNTAIN => 'Фонтан',
            static::BOOK => 'Книга заклинаний или молитвеник',
            static::BOARD => 'Доска объявлений',
            static::RECEIPT => 'Расписка на ездовое животное',
        };
    }
}
