<?php

namespace App\Enums;

enum PassageTraits: int
{
    case UNUSED = 1; // (не используется)
    case OPEN = 2; // Проход открыт на сбросе области
    case LOCKED = 3; // Проход заперт на сбросе области
    case UNBREAKABLE = 4; // Проход нельзя взломать
    case HIDDEN = 5; // Проход спрятан
    case OPAQUE = 6; // Через проход не видно, кто есть в следующей комнате
    case MONSTER_PROHIBITED = 7; // Монстры по собственной воле не ходят через этот проход
    case BARRIER = 8; // Только летающие могут тут пройти
    case NARROW = 9; // Отсекает последователей при проходе
    case ASYMMETRIC = 10; // Подтверждает преднамеренную несимметричность прохода, подавляя вывод сообщения на старте игры
    case DIFFERENT_KEYS = 11; //
    case DIFFERENT_DIFFICULTY = 12; //

    function label()
    {
        return match ($this) {
            static::UNUSED => 'Не используется',
            static::OPEN => 'Проход открыт на сбросе области',
            static::LOCKED => 'Проход заперт на сбросе области',
            static::UNBREAKABLE => 'Проход нельзя взломать',
            static::HIDDEN => 'Проход спрятан',
            static::OPAQUE => 'Через проход не видно, кто есть в следующей комнате',
            static::MONSTER_PROHIBITED => 'Монстры по собственной воле не ходят через этот проход',
            static::BARRIER => 'Только летающие могут тут пройти',
            static::NARROW => 'Отсекает последователей при проходе',
            static::ASYMMETRIC => 'Подтверждает преднамеренную несимметричность прохода, подавляя вывод сообщения на старте игры',
            static::DIFFERENT_KEYS => 'Разные ключи',
            static::DIFFERENT_DIFFICULTY => 'Разная сложность',
        };
    }
}
