<?php

namespace App\World;

class Monster {
    private $id;
    private $name;
    private $greeting;
    private $description;
    private $procedure;
    private $race;
    private $sex;
    private $profession;
    private $level;
    private $health;
    private $alignment;
    private $experience;
    private $attack;
    private $defense;
    private $money;
    private $damage;
    private $properties;
    private $effects;

    public function __construct($id, $name, $greeting, $description, $procedure, $race, $sex, $profession, $level, $health, $alignment, $experience, $attack, $defense, $money, $damage, $properties, $effects) {
        $this->id = $id;
        $this->name = $name;
        $this->greeting = $greeting;
        $this->description = $description;
        $this->procedure = $procedure;
        $this->race = $race;
        $this->sex = $sex;
        $this->profession = $profession;
        $this->level = $level;
        $this->health = $health;
        $this->alignment = $alignment;
        $this->experience = $experience;
        $this->attack = $attack;
        $this->defense = $defense;
        $this->money = $money;
        $this->damage = $damage;
        $this->properties = $properties;
        $this->effects = $effects;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getGreeting() {
        return $this->greeting;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getProcedure() {
        return $this->procedure;
    }

    public function getRace() {
        return $this->race;
    }

    public function getSex() {
        return $this->sex;
    }

    public function getProfession() {
        return $this->profession;
    }

    public function getLevel() {
        return $this->level;
    }

    public function getHealth() {
        return $this->health;
    }

    public function getAlignment() {
        return $this->alignment;
    }

    public function getExperience() {
        return $this->experience;
    }

    public function getAttack() {
        return $this->attack;
    }

    public function getDefense() {
        return $this->defense;
    }

    public function getMoney() {
        return $this->money;
    }

    public function getDamage() {
        return $this->damage;
    }

    public function getProperties() {
        return $this->properties;
    }

    public function getEffects() {
        return $this->effects;
    }
}

class MonsterParser {
    private $text;

    public function __construct($text) {
        $this->text = $text;
    }

    public function parse() {
        $lines = explode("\n", $this->text);
        $monster = array();

        foreach ($lines as $line) {
            if (strpos($line, 'ИМЯ') === 0) {
                $monster['name'] = trim(substr($line, 5));
            } elseif (strpos($line, 'СТРОКА') === 0) {
                $monster['greeting'] = trim(substr($line, 7));
            } elseif (strpos($line, 'ОПИСАНИЕ') === 0) {
                $monster['description'] = trim(substr($line, 10));
            } elseif (strpos($line, 'ПРОЦЕДУРА') === 0) {
                $monster['procedure'] = trim(substr($line, 9));
            } elseif (strpos($line, 'РАСА') === 0) {
                $monster['race'] = trim(substr($line, 5));
            } elseif (strpos($line, 'ПОЛ') === 0) {
                $monster['sex'] = trim(substr($line, 4));
            } elseif (strpos($line, 'ПРОФЕССИЯ') === 0) {
                $monster['profession'] = trim(substr($line, 10));
            } elseif (strpos($line, 'УРОВЕНЬ') === 0) {
                $monster['level'] = trim(substr($line, 8));
            } elseif (strpos($line, 'ЖИЗНЬ') === 0) {
                $monster['health'] = trim(substr($line, 6));
            } elseif (strpos($line, 'НАКЛОННОСТИ') === 0) {
                $monster['alignment'] = trim(substr($line, 11));
            } elseif (strpos($line, 'ОПЫТ') === 0) {
                $monster['experience'] = trim(substr($line, 6));
            } elseif (strpos($line, 'АТАКА') === 0) {
                $monster['attack'] = trim(substr($line, 7));
            } elseif (strpos($line, 'ЗАЩИТА') === 0) {
                $monster['defense'] = trim(substr($line, 8));
            } elseif (strpos($line, 'ДЕНЬГИ') === 0) {
                $monster['money'] = trim(substr($line, 7));
            } elseif (strpos($line, 'ВРЕД1') === 0) {
                $monster['damage'] = trim(substr($line, 6));
            } elseif (strpos($line, 'МСВОЙСТВА') === 0) {
                $monster['properties'] = explode(' ', trim(substr($line, 10)));
            } elseif (strpos($line, 'МЭФФЕКТЫ') === 0) {
                $monster['effects'] = explode(' ', trim(substr($line, 9)));
            }
        }

        return $monster;
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

