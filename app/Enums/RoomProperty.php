<?php

namespace App\Enums;

enum RoomProperty: int
{
    case DARKNESS = 1; // Всегда темная
    case DEATH = 2; // При входе персонаж умирает
    case NO_MONSTERS = 3; // Монстры не могут зайти
    case INSIDE = 4; // Внутри помещения
    case PEACE = 5; // Мирная
    case NO_COMMUNICATION = 6; // Коммуникации наружу и снаружи не работают
    case NO_TRACKS = 7; // Умение ВЫСЛЕДИТЬ не работает
    case NO_MAGIC = 8; // Магия не работает
    case NARROW = 9; // Только один персонаж может быть здесь одновременно
    case SECRET = 11; // Секретная комната
    case DANGER = 12; // Не может быть точкой прибытия "слова возвращения"
    case LIGHT = 15; // Всегда светлая
    case NO_RIDERS = 17; // Ездовые существа не могут зайти
    case REST = 18; // Комната отдыха
    case FOG = 19; // Не видно соседних комнат, даже если там светло
    case NO_TRANSFER = 20; // Магические способы перемещения не работают
    case LABORATORY = 21; // Ускоренное заучивание для магов
    case ALTAR = 22; // Ускоренное заучивание для священников
    case ROTATION = 23; // Любой выход ведет в случайный
    case DUMP = 24; // Любой упавший предмет пропадает
    case NATURE = 25; // Дикая природа, ВРАЩЕНИЕ без ориентирования
    case GOOD = 26; // ЛАБОРАТОРИЯ и АЛТАРЬ для добрых
    case NEUTRALITY = 27; // ЛАБОРАТОРИЯ и АЛТАРЬ для нейтральных
    case EVIL = 28; // ЛАБОРАТОРИЯ и АЛТАРЬ для злых
    case NOISE = 29; // В комнате не заучиваются заклинания

    function label()
    {
        return match ($this) {
            static::DARKNESS => 'ТЕМНОТА',
            static::DEATH => 'СМЕРТЬ',
            static::NO_MONSTERS => 'НЕТМОНСТРОВ',
            static::INSIDE => 'ВНУТРИ',
            static::PEACE => 'МИР',
            static::NO_COMMUNICATION => 'НЕТСВЯЗИ',
            static::NO_TRACKS => 'НЕТСЛЕДОВ',
            static::NO_MAGIC => 'НЕТМАГИИ',
            static::NARROW => 'УЗКАЯ',
            static::SECRET => 'СЕКРЕТ',
            static::DANGER => 'ОПАСНОСТЬ',
            static::LIGHT => 'СВЕТ',
            static::NO_RIDERS => 'НЕТЕЗДОВЫХ',
            static::REST => 'ОТДЫХ',
            static::FOG => 'ТУМАН',
            static::NO_TRANSFER => 'НЕТПЕРЕМЕЩЕНИЯ',
            static::LABORATORY => 'ЛАБОРАТОРИЯ',
            static::ALTAR => 'АЛТАРЬ',
            static::ROTATION => 'ВРАЩЕНИЕ',
            static::DUMP => 'СВАЛКА',
            static::NATURE => 'ПРИРОДА',
            static::GOOD => 'ДОБРО',
            static::NEUTRALITY => 'НЕЙТРАЛЬНОСТЬ',
            static::EVIL => 'ЗЛО',
            static::NOISE => 'ШУМ',
        };
    }
}
