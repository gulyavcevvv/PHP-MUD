<?php

namespace App\Enums;

enum Material: int
{
    case NO_MATERIAL = 0; // Нет материала
    case PEWTER = 1; // Олово
    case BRONZE = 2; // Бронза (металл)
    case COPPER = 3; // Медь
    case IRON = 4; // Железо (металл)
    case STEEL = 5; // Сталь (металл)
    case METAL = 9; // Прочие простые металлы
    case SILVER = 10; // Серебро
    case GOLD = 11; // Золото
    case PLATINUM = 12; // Платина
    case MYTHRIL = 13; // Мифрил (металл)
    case ADAMANTITE = 14; // Адамантит (металл)
    case PRECIOUS_METAL = 15; // Прочие драгоценные металлы или сплавы
    case CRYSTAL = 20; // Кристалл
    case ICE = 21; // Лед и сходные с ним замерзжие жидкости
    case THIN_WOOD = 22; // Тонкое дерево
    case THICK_WOOD = 23; // Толстое дерево
    case CERAMIC = 24; // Керамика
    case GLASS = 25; // Стекло
    case STONE = 26; // Камень
    case SOFT_STONE = 27; // Легко крошащийся непрочный камень
    case BONE = 28; // Кость
    case HORN = 29; // Рог, слоновая кость и прочная кость
    case CHITIN = 30; // Хитин
    case FEATHER = 31; // Перья птиц, или отдельное перо
    case CORAL = 32; // Коралл
    case SHELL = 33; // Раковина моллюсков, перламутр
    case FABRIC = 34; // Ткань
    case DENSE_FABRIC = 35; // Особо плотная ткань, войлок
    case LEATHER = 36; // Кожа
    case THIN_LEATHER = 37; // Тонкая кожа
    case SKIN = 38; // Шкура
    case SCALE = 39; // Чешуя
    case DRAGON_SKIN = 40; // Шкура дракона
    case ORGANIC = 41; // Органика
    case WAX = 42; // Воск
    case PARCHMENT = 43; // Пергамент
    case PAPER = 44; // Легкая, тонкая, но куда дороже!
    case JELLY = 45; // Желеобразная, студёнистая масса
    case LIQUID = 46; // Жидкость
    case GAS = 47; // Газ

    function label($value)
    {
        return match ($this) {
            static::NO_MATERIAL => 'Нет материала',
            static::PEWTER => 'Олово',
            static::BRONZE => 'Бронза (металл)',
            static::COPPER => 'Медь',
            static::IRON => 'Железо (металл)',
            static::STEEL => 'Сталь (металл)',
            static::METAL => 'Прочие простые металлы',
            static::SILVER => 'Серебро',
            static::GOLD => 'Золото',
            static::PLATINUM => 'Платина',
            static::MYTHRIL => 'Мифрил (металл)',
            static::ADAMANTITE => 'Адамантит (металл)',
            static::PRECIOUS_METAL => 'Прочие драгоценные металлы или сплавы',
            static::CRYSTAL => 'Кристалл',
            static::ICE => 'Лед и сходные с ним замерзжие жидкости',
            static::THIN_WOOD => 'Тонкое дерево',
        };
    }
}
