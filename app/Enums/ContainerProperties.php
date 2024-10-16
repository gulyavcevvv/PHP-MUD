<?php

namespace App\Enums;

enum ContainerProperties: int
{
    case CLOSES = 1; // Контейнер можно закрыть
    case UNBREAKABLE = 2; // Контейнер нельзя взломать
    case CLOSED = 3; // Контейнер закрыт при загрузке
    case LOCKED = 4; // Контейнер заперт при загрузке
    case DEAD = 5; // В контейнер ничего нельзя класть
    case UNKNOWN = 6; // Для областей не используется - труп персонажа

    function label()
    {
        return match ($this) {
            static::CLOSES => 'Можно закрыть',
            static::UNBREAKABLE => 'Нельзя взломать',
            static::CLOSED => 'Закрыт при загрузке',
            static::LOCKED => 'Заперт при загрузке',
            static::DEAD => 'Ничего нельзя класть',
            static::UNKNOWN => 'Для областей не используется',
        };
    }
}
