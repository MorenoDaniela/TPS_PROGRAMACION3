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

//Muestro todos los paises
echo $mundo->MostrarMundo();
//Muestro solo los paises que su capital sea Buenos aires
echo $mundo->BuscarNombreCapitalRegion("capital","Buenos Aires");
//Muestro solo los paises cuya region sea Asia
echo $mundo->BuscarNombreCapitalRegion("region","Asia");
//Muestro todos los paises que su nombre sea Bahamas
echo $mundo->BuscarNombreCapitalRegion("name","Bahamas");


$paisesAmericanos = $restCountries->fields(["name", "capital", "region","languages","callingCodes","population"])->byRegion("americas");
$encodeAmerica = json_encode($paisesAmericanos);
$arrayAmerica = json_decode($encodeAmerica);

foreach ($arrayAmerica as $paisAmericano)
{
    $paisA = new PaisesAmericanos("nombre","capital","region","idioma","callingCode","population");
    $paisA->__construct($paisAmericano->name,$paisAmericano->capital,$paisAmericano->region,$paisAmericano->languages,$paisAmericano->callingCodes,$paisAmericano->population);
    echo $paisA->MostrarAtributos();
    echo $paisA->MostrarPopulation();
}

echo PaisesAmericanos::MetodoEstatico();



/*
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

// create a log channel
$log = new Logger('name');
$log->pushHandler(new StreamHandler('name.log', Logger::WARNING));

// add records to the log
$log->warning('Foo');
$log->error('Bar');*/