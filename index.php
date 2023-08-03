<?php

abstract class Airplane
{
    private $name;
    private $speed;

    public function __construct($name, $speed)
    {
        $this->name = $name;
        $this->speed = $speed;
    }

    abstract public function takeoff();

    abstract public function landing();

    abstract public function getStatus();
}

class RealizationAirplane extends Airplane
{
    public function takeoff()
    {
        // реализация
    }

    public function landing()
    {
        // реализация
    }

    public function getStatus()
    {
        // реализация
    }
}

class MIG extends RealizationAirplane
{
    private $attack;

    public function __construct($name, $speed, $attack)
    {
        parent::__construct($name, $speed);
        $this->attack = $attack;
    }
}

class TU_134 extends RealizationAirplane
{
    public function __construct($name, $speed)
    {
        parent::__construct($name, $speed);
    }
}

class Airport
{
    private $listThePlane;
    private $parkedPlanes;
    private $repairPlanes;

    public function __construct()
    {
        $this->listThePlane = [];
        $this->parkedPlanes = [];
        $this->repairPlanes = [];
    }

    public function takePlane(Airplane $plane)
    {
        $this->listThePlane[] = $plane;
    }

    public function planeFlewAway(Airplane $plane)
    {
        $index = array_search($plane, $this->listThePlane);
        if ($index !== false) {
            unset($this->listThePlane[$index]);
        }
    }

    public function planeIsParked(Airplane $plane)
    {
        $this->parkedPlanes[] = $plane;
    }

    public function planeIsReadyToTake(Airplane $plane)
    {
        $index = array_search($plane, $this->parkedPlanes);
        if ($index !== false) {
            unset($this->parkedPlanes[$index]);
        }
    }

    public function planeIsBroken(Airplane $plane)
    {
        $this->repairPlanes[] = $plane;
    }

    public function planeIsRepair(Airplane $plane)
    {
        $index = array_search($plane, $this->repairPlanes);
        if ($index !== false) {
            unset($this->repairPlanes[$index]);
        }
    }
}