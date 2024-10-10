<?php

namespace App\Enums;

enum PProperty: int
{
    case LIGHTNING = 1; // Мягко светится
    case NOISY = 2; // Тихо шумит
    case GAME = 3; // Выбрасывается при уходе на постой
    case RECHARGEABLE = 4; // Не разрушается при окончании зарядов
    case BOWSTRING = 5; // Каждый второй раунд тратится на натягивание тетивы
    case INVISIBLE = 6; // Невидимый
    case MAGICAL = 7; // Магический
    case CURSED = 8; // Проклятый
    case BLESSED = 9; // Благословленный
    case USELESS = 10; // Не продается
    case FRAGILE = 11; // Самоуничтожается при попадании на землю
    case COVER = 12; // Будучи надетым, скрывает под собой другие предметы
    case SMELLING = 13; // Неприятно пахнет
    case BURIED = 14; // Спрятан
    case TEACHING = 15; // Носящий предмет получает умения, которых не было
    case REMOVABLE = 16; // Предмет можно снять, если он был проклят
    case ANIMAL = 17; // Можно носить животным
    case AROMATIC = 18; // Ароматный
    case LARGE = 19; // Предмет виден из соседних комнат, виден при переноске (если его можно взять), его сильно сложнее украсть
    case REUSABLE = 20; // для ключей (и, возможно, прочих одноразовых предметов) отменяет немедленное уничтожение
    case MERCHANDISE = 21; // Такие вещи покупаются магазинами без ограничений
    case PERSONAL = 22; // Предмет не может брать никто кроме его владельца
    case INCOMPREHENSIBLE = 23; // "Знание свойств" бессильно на этот предмет

    function label($value)
    {
        return match ($this) {
            static::LIGHTNING => 'Светящийся',
            static::NOISY => 'Шумный',
            static::GAME => 'Игровой',
            static::RECHARGEABLE => 'Перезаряжающийся',
            static::BOWSTRING => 'Тетива',
            static::INVISIBLE => 'Невидимый',
            static::MAGICAL => 'Магический',
            static::CURSED => 'Проклятый',
            static::BLESSED => 'Благословленный',
            static::USELESS => 'Бесполезный',
            static::FRAGILE => 'Хрупкий',
            static::COVER => 'Покров',
            static::SMELLING => 'Пахнущий',
            static::BURIED => 'Закопанный',
            static::TEACHING => 'Обучающий',
            static::REMOVABLE => 'Снимаемый',
            static::ANIMAL => 'Животный',
            static::AROMATIC => 'Ароматный',
            static::LARGE => 'Большой',
            static::REUSABLE => 'Многоразовый',
            static::MERCHANDISE => 'Товар',
            static::PERSONAL => 'Личный',
            static::INCOMPREHENSIBLE => 'Непостижимый',
        };
    }
}
