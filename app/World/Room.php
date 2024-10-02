<?php

namespace App\World;

class Room {
    private $id;
    private $name;
    private $description;
    private $location;
    private $exits;
    private $properties;
    private $monsters;
    private $items;

    public function __construct($id, $name, $description, $location, $exits, $properties, $monsters, $items) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->location = $location;
        $this->exits = $exits;
        $this->properties = $properties;
        $this->monsters = $monsters;
        $this->items = $items;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getLocation() {
        return $this->location;
    }

    public function getExits() {
        return $this->exits;
    }

    public function getProperties() {
        return $this->properties;
    }

    public function getMonsters() {
        return $this->monsters;
    }

    public function getItems() {
        return $this->items;
    }
}

class RoomParser {
    private $text;

    public function __construct($text) {
        $this->text = $text;
    }

    public function parse() {
        $lines = explode("\n", $this->text);
        $room = array();

        foreach ($lines as $line) {
            if (strpos($line, 'НАЗВАНИЕ') === 0) {
                $room['name'] = trim(substr($line, 7));
            } elseif (strpos($line, 'ОПИСАНИЕ') === 0) {
                $room['description'] = trim(substr($line, 9));
            } elseif (strpos($line, 'МЕСТНОСТЬ') === 0) {
                $room['location'] = trim(substr($line, 9));
            } elseif (strpos($line, 'ЮГ') === 0) {
                $room['exits']['south'] = trim(substr($line, 4));
            } elseif (strpos($line, 'КСВОЙСТВА') === 0) {
                $room['properties'] = explode(' ', trim(substr($line, 9)));
            } elseif (strpos($line, 'МОНСТРЫ') === 0) {
                $room['monsters'] = trim(substr($line, 8));
            } elseif (strpos($line, 'ПРЕДМЕТЫ') === 0) {
                $room['items'] = trim(substr($line, 8));
            }
        }

        return $room;
    }
}

$text = "НАЗВАНИЕ \"Гостиная таверны \"\"Последний приют\"\"\"
ОПИСАНИЕ \"Вы стоите в гостиной легендарной таверны \"\"Последний приют\"\"\", где начинались и начинаются многие приключения. Таверна расположилась высоко в ветвях огромного дерева валлина, как и многие другие здания в городке Утеха. Искатели приключений, уставшие от подвигов, остаются здесь на постой, чтобы отдохнуть, собраться с новыми силами и вновь пойти путешествовать. Вокруг стоят ящики, в которых хранятся личные вещи постояльцев, а узкая лестница ведет наверх, к жилым комнатам.\"
МЕСТНОСТЬ ПОМЕЩЕНИЕ
ЮГ 2001
КСВОЙСТВА НЕТМОНСТРОВ ВНУТРИ МИР
МОНСТРЫ 2000
ПРЕДМЕТЫ 2101";

$parser = new RoomParser($text);
$room = $parser->parse();

print_r($room);

