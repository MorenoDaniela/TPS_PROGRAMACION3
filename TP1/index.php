<?php

require_once __DIR__ .'/vendor/autoload.php';
include_once './pais.php';
include './paisesAmericanos.php';
include './mundo.php';

use NNV\RestCountries;

$restCountries = new RestCountries;
$paises = $restCountries->fields(["name", "capital", "region"])->all();
$array = json_encode($paises);
$prueba = json_decode($array);

$mundo = new Mundo($prueba);
$mundo->__construct($prueba);
echo $mundo->MostrarMundo();

$paisesAmericanos = $restCountries->fields(["name", "capital", "region","languages","callingCodes","population"])->byRegion("americas");
$encodeAmerica = json_encode($paisesAmericanos);
$arrayAmerica = json_decode($encodeAmerica);

/*
foreach($prueba as $obj)
{
    $pais = new Pais ("nombre","capital","region");
    $pais->__construct($obj->name,$obj->capital,$obj->region);
    echo $pais->MostrarAtributos();
}*/

foreach ($arrayAmerica as $paisAmericano)
{
    $paisA = new PaisesAmericanos("nombre","capital","region","idioma","callingCode","population");
    $paisA->__construct($paisAmericano->name,$paisAmericano->capital,$paisAmericano->region,$paisAmericano->languages,$paisAmericano->callingCodes,$paisAmericano->population);
    echo $paisA->MostrarAtributos();
    echo $paisA->MostrarPopulation();
}


/*
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('name.log', Logger::WARNING));

// add records to the log
$log->warning('Foo');
$log->error('Bar');*/