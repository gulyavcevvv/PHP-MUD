<?php

namespace App\World;

class TriggerParser {
    public function parse($triggerString) {
        $lines = explode("\n", $triggerString);
        $trigger = new Trigger();

        $code = '';
        $inCodeBlock = false;

        foreach ($lines as $line) {
            if (preg_match('/#(\d+)/', $line, $match)) {
                $trigger->setId((int) $match[1]);
            } elseif (preg_match('/(.+)~/', $line, $match)) {
                $trigger->setDescription(trim($match[1]));
            } elseif (preg_match('/(\d+) q (\d+)/', $line, $match)) {
                $trigger->setConditions(array('room' => (int) $match[1], 'priority' => (int) $match[2]));
            } elseif ($line == '~') {
                $inCodeBlock = true;
            } elseif ($inCodeBlock) {
                $code .= $line . "\n";
            }
        }

        $trigger->setCode($code);

        return $trigger;
    }
}

class Trigger {
    private $id;
    private $description;
    private $conditions;
    private $code;

    public function setId($id) {
        $this->id = $id;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setConditions($conditions) {
        $this->conditions = $conditions;
    }

    public function setCode($code) {
        $this->code = $code;
    }

    public function getId() {
        return $this->id;
    }

    public function getDescription() {
        return $this->description;
    }

    public function getConditions() {
        return $this->conditions;
    }

    public function getCode() {
        return $this->code;
    }
}