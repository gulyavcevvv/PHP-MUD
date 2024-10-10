<?php

namespace App\Enums;

enum Race: int
{
    case HUMAN = 0; // Человек
    case HIGH_ELF = 1; // Высокий эльф
    case WILD_ELF = 2; // Дикий эльф
    case HALF_ELF = 3; // Полуэльф
    case DWARF_MECHANIC = 4; // Гном-механик
    case DWARF = 5; // Гном
    case KENDER = 6; // Кендер
    case MINOTAUR = 7; // Минотавр
    case BARBARIAN = 8; // Варвар
    case GOBLIN = 9; // Гоблин
    case CHARACTER = 20; // Персона
    case MONSTER = 21; // Монстр
    case ANIMAL = 22; // Животное (кроме тех, которые НАСЕКОМОЕ)
    case UNDEAD = 23; // Нежить
    case DRAGON = 24; // Дракон
    case INSECT = 25; // Насекомое (а также пауки, черви и т.п.)
    case PLANT = 26; // Растение, гриб, мох и т.п.
    case JELLY = 27; // Всякие слизи, желе, губки и прочие
    case DEVICE = 28; // Искуственные механические и магические творения, например големы, см.также флаг МАГИЧЕСКИЙ
    case GIANT = 29; // Гуманоиды огромных размеров, в т.ч. тролли

    function label($value)
    {
        return match ($this) {
            static::HUMAN => 'Человек',
            static::HIGH_ELF => 'Высокий эльф',
            static::WILD_ELF => 'Дикий эльф',
            static::HALF_ELF => 'Полуэльф',
            static::DWARF_MECHANIC => 'Гном-механик',
            static::DWARF => 'Гном',
            static::KENDER => 'Кендер',
            static::MINOTAUR => 'Минотавр',
            static::BARBARIAN => 'Варвар',
            static::GOBLIN => 'Гоблин',
            static::CHARACTER => 'Персона',
            static::MONSTER => 'Монстр',
            static::ANIMAL => 'Животное',
            static::UNDEAD => 'Нежить',
            static::DRAGON => 'Дракон',
            static::INSECT => 'Насекомое',
            static::PLANT => 'Растение',
            static::JELLY => 'Жидкотел',
            static::DEVICE => 'Устройство',
            static::GIANT => 'Великан',
        };
    }
}
