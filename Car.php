<?php


abstract class Car
{
    public $year;
    public $place;
    public $color;
    public $crashes = [];

    const possibleCrashes = [
        'Engine',
        'Wheel',
        'Body',
        'Trunc',
        'Braking System',
        'Transmission',
        'Electronic',
    ];

    public function __construct(int $year, string $place, string $color, string $crashes)
    {
        $this->year = $year;
        $this->place = $place;
        $this->color = $color;
        $this->setCrushes($crashes);
    }

    public function setCrushes(string $crashes)
    {
        if (in_array($crashes, self::possibleCrashes)) {
            $this->crashes[] = $crashes;
        } else {
            echo 'Enter Correct Crushes' . PHP_EOL;
        }
    }
}