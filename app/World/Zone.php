<?php

namespace App\World;

use ResetCondition;

class Zone {

    private $id;
    private $name;
    private $start;
    private $stop;
    private $reset_period;
    private ResetCondition $reset_condition;
    private $description;

    public function __construct($id, $name, $start, $stop, $reset_period, $reset_condition, $description) {
        $this->id = $id;
        $this->name = $name;
        $this->start = $start;
        $this->stop = $stop;
        $this->reset_period = $reset_period;
        $this->reset_condition = ResetCondition::from($reset_condition);
        $this->description = $description;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getStart() {
        return $this->start;
    }

    public function getStop() {
        return $this->stop;
    }

    public function getResetPeriod() {
        return $this->reset_period;
    }

    public function getResetCondition() {
        return $this->reset_condition;
    }

    public function getDescription() {
        return $this->description;
    }

}
