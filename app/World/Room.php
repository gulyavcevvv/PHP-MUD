<?php

namespace App\World;

class Room
{
    public $id;
    public $name;
    public $description;
    public $location;
    public $properties;
    public $monsters;
    public $items;

    public function __construct($id, $name, $description, $location, $properties, $monsters, $items)
    {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->location = $location;
        $this->properties = $properties;
        $this->monsters = $monsters;
        $this->items = $items;
    }

    public function parser()
    {
        // Путь к файлу
        $path = 'data.txt';

        // Чтение содержимого файла
        $content = file_get_contents($path);

        // Парсинг данных
        preg_match_all('/^(?P<key>\w+)\s*(?P<value>(?:"[^"]*"|[^\n]+))\s*$/m', $content, $matches);

        // Создание массива объектов
        $rooms = [];
        foreach ($matches as $room) {
            // Инициализация нового объекта комнаты
            $roomObj = new \stdClass();

            foreach ($room as $k => $v) {
                if (!empty($v)) {
                    switch ($k) {
                        case 'KEY':
                            $roomObj->id = intval($v);
                            break;
                        case 'VALUE':
                            list($type, $value) = explode(' ', trim($v), 2);
                            switch ($type) {
                                case 'NАЗВАНИЕ':
                                    $roomObj->name = stripcslashes(trim($value));
                                    break;
                                case 'ОПИСАНИЕ':
                                    $roomObj->description = stripcslashes(trim($value));
                                    break;
                                case 'МЕСТНОСТЬ':
                                    $roomObj->locality = trim($value);
                                    break;
                                default:
                                    continue;
                            }
                        default:
                            continue;
                    }
                }
            }

            // Добавление объекта в массив
            array_push($rooms, $roomObj);
        }

        // Вывод результата
        print_r($rooms);
    }
}
