<?php

class Pais
{
    public $nombre;
    public $capital;
    public $region;

    public function __construct ($name,$capital,$region)
    {
        $this->nombre=$name;
        $this->capital=$capital;
        $this->region=$region;
    }

    public function MostrarAtributos()
    {
        return "El pais {$this->nombre} tiene de capital a {$this->capital} y su region es {$this->region} ";
    }
    
    public function BuscarEspañol()
    {
        $string = "Los paises de habla español son: ";
        if ($this->idioma=="Spanish");
        {
            $string .= "{$this->nombre}";
            echo $string;
        }
    }
    
}
/*
    public function CargarAtributos()
    {
        use NNV\RestCountries;

        $restCountries = new RestCountries;

        //$paises = $restCountries->all();
        echo $restCountries->fields(["name", "capital", "region"])->all();
    }
use NNV\RestCountries;

$restCountries = new RestCountries;

$paises = $restCountries->all();

echo json_encode($paises);*/

