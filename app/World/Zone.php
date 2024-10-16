<?php

namespace App\World;

use App\Enums\ResetCondition;

class Zone {

    private $id;
    private $vnum;
    private $name;
    private $start;
    private $stop;
    private $reset_period;
    private ResetCondition $reset_condition;
    private $description;

    private static $rooms = array();
	private static $mobs = array();
	private static $objs = array();

    public function __construct($id, $name, $start, $stop, $reset_period, $reset_condition, $description) {
        $this->id = $id;
        $this->vnum = $start/100;
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

    public function getVnum() {
        return $this->vnum;
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

    public function getRooms() {
        return $this->rooms;
    }

    public function addRoom(Room $room) {
        $this->rooms[$room->getId()] = $room;
    }

    public function addMob(Mob $mob) {
        $this->mobs[$mob->getId()] = $mob;
    }

    public function addObj(Obj $obj) {
        $this->objs[$obj->getId()] = $obj;
    }
}
