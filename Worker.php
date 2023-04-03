<?php


abstract class Worker
{
    public $price;
    public $is_free;
    public $carCanRepair;
    public $specialSkill = [];
    public $car;

    public function __construct(int $price, bool $is_free, string $carCanRepair, array $specialSkill = [])
    {
        $this->price = $price;
        $this->is_free = $is_free;
        $this->carCanRepair = $carCanRepair;
        $this->specialSkill = $specialSkill;
    }

    public function diagnostic()
    {
        echo 'Running Diagnostics...' . PHP_EOL;
        if ($this->car->crashes){
            $this->repair();
        } else {
            $this->cantRepair();
        }
    }

    public function repair()
    {
        echo 'Car repaired' . PHP_EOL;
        echo 'Need to Pay ' . $this->paiment();
    }

    public function paiment()
    {
        return $this->price;
    }
    public function cantRepair()
    {
        echo 'Can`t Repair Car' . PHP_EOL;
    }

    public function setIsFree(bool $is_free): void
    {
        $this->is_free = $is_free;
    }

    public function getIsFree(): bool
    {
        return $this->is_free;
    }

    public function getCar()
    {
        return $this->car;
    }

    public function setCar(Car $car): void
    {
        $this->car = $car;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function setCarCanRepair(string $carCanRepair): void
    {
        $this->carCanRepair = $carCanRepair;
    }

    public function getCarCanRepair(): string
    {
        return $this->carCanRepair;
    }
}