<?php

namespace App\Enums;

enum Profession: int
{
    case MAGICIAN = 0; // Маг
    case MISHAKAL = 1; // Жрец Мишакаль
    case THIEF = 2; // Вор
    case MERCENARY = 3; // Наемник
    case ASSASSIN = 4; // Ассассин
    case RANGER = 5; // Следопыт
    case SOLAMNIC_KNIGHT = 6; // Рыцарь Соламнии
    case MORGION = 7; // Жрец Моргиона
    case CHISLEV = 8; // Жрец Числев
    case SARGONNAS = 9; // Жрец Саргоннаса
    case KYRIJOLITH = 10; // Жрец Кири-Джолита
    case NO_PROFESSION = 11; // Нет профессии

    function label()
    {
        return match ($this) {
            static::MAGICIAN => 'Маг',
            static::MISHAKAL => 'Жрец Мишакаль',
            static::THIEF => 'Вор',
            static::MERCENARY => 'Наемник',
            static::ASSASSIN => 'Ассассин',
            static::RANGER => 'Следопыт',
            static::SOLAMNIC_KNIGHT => 'Рыцарь Соламнии',
            static::MORGION => 'Жрец Моргиона',
            static::CHISLEV => 'Жрец Числев',
            static::SARGONNAS => 'Жрец Саргоннаса',
            static::KYRIJOLITH => 'Жрец Кири-Джолита',
            static::NO_PROFESSION => 'Нет профессии',
        };
    }
}
