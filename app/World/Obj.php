<?php

namespace App\World;

class Obj {
    private $id;
    private $name;
    private $description_short;
    private $description;
    private $gender;
    private $type;
    private $material;
    private $weight;
    private $price;
    private $rider;
    private $stable1;
    private $stable2;
    private $stable3;
    private $usage;

    public function __construct($id, $name, $description_short, $description, $gender, $type, $material, $weight, $price, $rider, $stable1, $stable2, $stable3, $usage) {
        $this->id = $id;
        $this->name = $name;
        $this->description_short = $description_short;
        $this->description = $description;
        $this->gender = $gender;
        $this->type = $type;
        $this->material = $material;
        $this->weight = $weight;
        $this->price = $price;
        $this->rider = $rider;
        $this->stable1 = $stable1;
        $this->stable2 = $stable2;
        $this->stable3 = $stable3;
        $this->usage = $usage;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getDescriptionShort() {
        return $this->description_short;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getGender() {
        return $this->gender;
    }

    public function getType() {
        return $this->type;
    }

    public function getMaterial() {
        return $this->material;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function getPrice() {
        return $this->price;
    }

    public function getRider() {
        return $this->rider;
    }

    public function getStable1() {
        return $this->stable1;
    }

    public function getStable2() {
        return $this->stable2;
    }

    public function getStable3() {
        return $this->stable3;
    }

    public function getUsage() {
        return $this->usage;
    }
}

class ItemParser {
    private $text;

    public function __construct($text) {
        $this->text = $text;
    }

    public function parse() {
        $lines = explode("\n", $this->text);
        $item = array();

        foreach ($lines as $line) {
            if (strpos($line, 'НАЗВАНИЕ') === 0) {
                $item['name'] = trim(substr($line, 8));
            } elseif (strpos($line, 'СТРОКА') === 0) {
                $item['description_short'] = trim(substr($line, 7));
            } elseif (strpos($line, 'ОПИСАНИЕ') === 0) {
                $item['description'] = trim(substr($line, 10));
            } elseif (strpos($line, 'РОД') === 0) {
                $item['gender'] = trim(substr($line, 4));
            } elseif (strpos($line, 'ТИП') === 0) {
                $item['type'] = trim(substr($line, 4));
            } elseif (strpos($line, 'МАТЕРИАЛ') === 0) {
                $item['material'] = trim(substr($line, 8));
            } elseif (strpos($line, 'ВЕС') === 0) {
                $item['weight'] = trim(substr($line, 4));
            } elseif (strpos($line, 'ЦЕНА') === 0) {
                $item['price'] = trim(substr($line, 5));
            } elseif (strpos($line, 'СКАКУН') === 0) {
                $item['rider'] = trim(substr($line, 7));
            } elseif (strpos($line, 'КОНЮХ1') === 0) {
                $item['stable1'] = trim(substr($line, 8));
            } elseif (strpos($line, 'КОНЮХ2') === 0) {
                $item['stable2'] = trim(substr($line, 8));
            } elseif (strpos($line, 'КОНЮХ3') === 0) {
                $item['stable3'] = trim(substr($line, 8));
            } elseif (strpos($line, 'ИСПОЛЬЗОВАНИЕ') === 0) {
                $item['usage'] = trim(substr($line, 11));
            }
        }

        return $item;
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

