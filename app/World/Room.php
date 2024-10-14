<?php

namespace App\World;

use App\Enums\Direction;
use App\Enums\Terrain;

class Room
{
    private $id;
    private $name;
    private $description;
    private $location;
    private $exits;
    private $properties;
    private $monsters;
    private $items;

    public function __construct() {}

    public function getId()
    {
        return $this->id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function getLocation()
    {
        return $this->location;
    }

    public function getExits()
    {
        return $this->exits;
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function getMonsters()
    {
        return $this->monsters;
    }

    public function getItems()
    {
        return $this->items;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function setLocation($location)
    {
        //$this->location = Terrain::from($location);
        $this->location = $location;
    }

    public function setExits($exits, Direction $direction)
    {
        $this->exits[$direction->value] = $exits;
    }

    public function setProperties($properties)
    {
        $this->properties = $properties;
    }

    public function setMonsters($monsters)
    {
        $this->monsters = $monsters;
    }


    public function setItems($items)
    {
        $this->items = $items;
    }

    public function addItems($item)
    {
        $this->items[] = $item;
    }
}
