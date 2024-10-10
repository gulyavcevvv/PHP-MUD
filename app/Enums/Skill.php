<?php

namespace App\Enums;

enum Skills: int
{
    case STAB = 301; // Заколоть
    case STRIKE = 302; // Сбить
    case HIDE = 303; // Прятаться
    case KICK = 304; // Пнуть
    case BREAK = 305; // Взломать
    case OVERCOME = 306; // Преодолеть
    case SAVE = 307; // Спасти
    case SNEAK = 308; // Красться
    case STEAL = 309; // Украсть
    case TRACK = 310; // Выследить
    case TWIRL = 311; // Вращать
    case PARRY = 312; // Парировать
    case DISARM = 313; // Разоружить
    case OBSERVE = 314; // Приглядеться
    case BARGAIN = 315; // Торговаться
    case DODGE = 316; // Уклониться
    case FIND = 317; // Найти
    case LISTEN = 318; // Слушать
    case MOP = 321; // Замести
    case POISON = 322; // Отравить
    case SNARE = 323; // Подсечь
    case BERSERK = 324; // Берсерк
    case BLIND = 325; // Вслепую
    case BUTCHER = 326; // Разделать
    case TAME = 327; // Приручить
    case ORIENT = 328; // Ориентироваться
    case LAY = 329; // Возложить
    case BANDAGE = 330; // Перевязать
    case INTIMIDATE = 331; // Запугать
    case MANEUVER = 332; // Маневрировать
    case POSITION = 333; // Расположиться
    case BLOCK = 334; // Блокировать
    case DIVERSE = 335; // Отвлечь
    case SWITCH = 337; // Переключиться
    case BANISH = 338; // Изгнать
    case ABANDON = 339; // Отрешиться
    case UNK = 381; // Рукопашный бой
    case THRUSTING = 382; // Колющее
    case CUTTING = 383; // Режущее
    case TWO_HANDED = 384; // Двуручное
    case POLE = 385; // Древковое
    case CHOPPING = 386; // Рубящее
    case IMPACT = 387; // Ударное
    case SHOOTING = 388; // Стрелковое
    case MISC = 389; // Прочее
    case STAVES = 390; // Посохи
}
