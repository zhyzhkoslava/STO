<?php

spl_autoload_register(function ($class_name)
{
    require_once $class_name . '.php';
});

$bmw = new BWM(2000, 'Germany', 'black', 'Engine');
$ford = new Ford(2020, 'USA', 'white', 'Transmission');
$lexus = new Lexus(1999, 'Japan', 'red', 'Wheel');
$kia = new KIA(2010, 'Korea', 'green', 'Electronic');

//var_dump($bmw);
$worker1 = new Worker1(100, true, 'BMW', ['universal' => true]);
$worker2 = new Worker2(200, false, 'FORD', ['universal' => true]);
$worker3 = new Worker3(100, true, 'KIA', ['year'=>'>2005']);
$worker4 = new Worker4(200, false, 'LEXUS', ['country'=>'Germany']);
$worker5 = new Worker5(100, true, 'BMW', ['year'=>'<1998']);
$worker6 = new Worker6(200, false, 'FORD', ['county'=>'Japan', 'crashes'=>'Engine']);
$worker7 = new Worker7(300, true, 'AUDI', ['universal' => true]);

$sto = new STO([$worker1,$worker2,$worker3,$worker4,$worker5,$worker6,$worker7], [$bmw, $ford, $lexus, $kia]);
$sto->checkWorkerAbilityToRepair($sto->getWorkers());

