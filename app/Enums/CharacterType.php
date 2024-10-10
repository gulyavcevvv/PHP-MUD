<?php

namespace App\Enums;

enum CharacterType: int
{
    case GOOD = 1; // Добрые
    case EVIL = 2; // Злые
    case NEUTRAL = 3; // Нейтральные
    case MAGICIAN = 4; // Маги
    case PRIEST = 5; // Жрецы
    case ROGUE = 6; // Плуты
    case WARRIOR = 7; // Воины
    case MAN = 15; // Мужчины
    case WOMAN = 16; // Женщины
    case HUMAN = 17; // Люди
    case HIGH_ELF = 18; // Высокие эльфы
    case WILD_ELF = 19; // Дикие эльфы
    case HALF_ELF = 20; // Полуэльфы
    case DWARF_MECHANIC = 21; // Гномы-механики
    case DWARF = 22; // Гномы
    case KENDER = 23; // Кендеры
    case MINOTAUR = 24; // Минотавры
    case BARBARIAN = 25; // Варвары
    case GOBLIN = 26; // Гоблины

    function label($value)
    {
        return match ($this) {
            static::GOOD => 'Добрые',
            static::EVIL => 'Злые',
            static::NEUTRAL => 'Нейтральные',
            static::MAGICIAN => 'Маги',
            static::PRIEST => 'Жрецы',
            static::ROGUE => 'Плуты',
            static::WARRIOR => 'Воины',
            static::MAN => 'Мужчины',
            static::WOMAN => 'Женщины',
            static::HUMAN => 'Люди',
            static::HIGH_ELF => 'Высокие эльфы',
            static::WILD_ELF => 'Дикие эльфы',
            static::HALF_ELF => 'Полуэльфы',
            static::DWARF_MECHANIC => 'Гномы-механики',
            static::DWARF => 'Гномы',
            static::KENDER => 'Кендеры',
            static::MINOTAUR => 'Минотавры',
            static::BARBARIAN => 'Варвары',
            static::GOBLIN => 'Гоблины',
        };
    }
}
