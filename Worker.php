<?php


abstract class Worker
{
    public $price;
    public $is_free;
    public $carsCanRepair = [];

    public function __construct(int $price, bool $is_free, array $carsCanRepair)
    {
        $this->price = $price;
        $this->is_free = $is_free;
        $this->carsCanRepair[] = $carsCanRepair;
    }
}