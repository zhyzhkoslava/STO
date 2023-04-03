<?php


class STO
{
    public $workers = [];
    public $cars = [];
    public $carsInProgress = [];
    public $worker;

    public function __construct(array $workers = [], array $cars = [])
    {
        $this->workers = $workers;
        $this->cars = $cars;
    }

    public function setWorker(Worker $worker): void
    {
        $this->workers = $worker;
    }

    public function getWorkers(): array
    {
        return $this->workers;
    }

    public function getCars(): array
    {
        return $this->cars;
    }

    public function getFreeWorkers(): array
    {
        $allWorkers = $this->getWorkers();
        $freeWorkers = [];

        foreach ($allWorkers as $worker) {
            if ($worker->is_free === true) {
                $freeWorkers[] = $worker;
            }
        }

        return $freeWorkers;
    }

    public function checkWorkerAbilityToRepair(array $freeWorkers): bool
    {
        $availableCars = $this->getCars();

        if (empty($freeWorkers)) {
            return 'No free Workers Available!';
        }

        foreach ($freeWorkers as $worker) {
            foreach ($availableCars as $car) {
                if ($worker->carCanRepair == get_class($car)) {

                    $this->checkSpecialSkill($worker, $car);

                    return true;
                }
            }
        }

        return false;
    }

    public function assignCartoWorker(Worker $worker, Car $car)
    {
        $worker->setCar($car);
        $worker->setIsFree(false);
        $this->carsInProgress = $car;
        echo 'Car ' . get_class($car) . ' assigned to worker ' . get_class($worker).PHP_EOL;

        $worker->diagnostic();
    }

    public function getDiagnosticResult($worker)
    {
        var_dump($worker);
    }

    public function checkSpecialSkill(Worker $worker, Car $car)
    {
        foreach ($worker->specialSkill as $key => $value) {
            if ($key === 'universal' && $value === true) {
                $this->assignCartoWorker($worker, $car);
                break;
            }

            if ($key === 'county' && $car->place == $value) {
                $this->assignCartoWorker($worker, $car);
                break;
            }

            if (($key === 'year') && ($this->checkWorkerCanRepairCarByYear($car->year, $value))) {
                $this->assignCartoWorker($worker, $car);
                break;
            }
        }
    }

    public function checkWorkerCanRepairCarByYear($carYear, $value)
    {
        $sign = $value[0];
        $year = mb_substr($value, 1);

        if ($sign == '>') {
            return $carYear > $year;
        } else {
            return $carYear < $year;
        }
    }

    public function workDone()
    {
    }

    public function workNotDone()
    {
    }

    public function paymentFull()
    {
    }

    public function paymentNotFull()
    {
    }
}