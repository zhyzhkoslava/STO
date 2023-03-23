<?php


abstract class Car
{
    public $year;
    public $place;
    public $color;
    public $crashes = [];

    const possibleCrashes = [];

    public function __construct(int $year, string $place, string $color, array $crashes)
    {
        $this->year = $year;
        $this->place = $place;
        $this->color = $color;
        $this->crashes[] = $crashes;
    }
}