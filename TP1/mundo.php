<?php
/**
 * Clase Mundo
 */
require_once __DIR__ .'/vendor/autoload.php';
use NNV\RestCountries;
class Mundo
{
    protected $restCountries;
    protected $prueba;
    protected $arrayAmerica;

    /**
     * Constructor de mundo
     */
    public function __construct()
    {
        $this->restCountries = new RestCountries;

        $paises = $this->restCountries->fields(["name", "capital", "region"])->all();
        $array = json_encode($paises);
        $this->prueba = json_decode($array);

        $paisesAmericanos = $this->restCountries->fields(["name", "capital", "region","languages","callingCodes","population"])->byRegion("americas");
        $encodeAmerica = json_encode($paisesAmericanos);
        $this->arrayAmerica = json_decode($encodeAmerica);
    }

    /**
     * Funcion que reutiliza la funcion MostrarAtributos de la clase país, crea los paises y muestra los atributos de cada pais que posee el mundo.
     */
    public function MostrarMundo()
    {
        foreach($this->prueba as $obj)
        {
            $pais = new Pais ($obj->name,$obj->capital,$obj->region);
            //$pais->__construct($obj->name,$obj->capital,$obj->region);
            echo "{$pais->MostrarAtributos()} <br>";
        }
    }

    /**
     * Funcion que crea los paises Americanos.
     */
    public function MostrarPaisesAmericanos()
    {
        foreach ($this->arrayAmerica as $paisAmericano)
        {
            $paisA = new PaisesAmericanos($paisAmericano->name,$paisAmericano->capital,$paisAmericano->region,$paisAmericano->languages,$paisAmericano->callingCodes,$paisAmericano->population);
            //$paisA->__construct($paisAmericano->name,$paisAmericano->capital,$paisAmericano->region,$paisAmericano->languages,$paisAmericano->callingCodes,$paisAmericano->population);
            echo $paisA->MostrarAtributos();
            echo $paisA->MostrarPopulation();
        }
    }

    /**
     * Funcion para buscar algun atributo del pais con un parametro determinado, el primer parametro
     * $buscar puede ser "name, region o capital" el segundo parametro es lo que se busca.
     */
    public function BuscarNombreCapitalRegion($buscar,$lugar)
    {
        foreach ($this->prueba as $obj)
        {
            if ($obj->$buscar==$lugar)
            {
                $pais = new Pais ($obj->name,$obj->capital,$obj->region);
                //$pais->__construct($obj->name,$obj->capital,$obj->region);
                echo "{$pais->MostrarAtributos()}, <br>";
            }
        } 
    }

}