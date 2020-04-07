<?php
/**
 * Clase Mundo
 */
class Mundo
{
    public $array;

    /**
     * Constructor de mundo recibe un parametro
     */
    public function __construct($array)
    {
        $this->array = $array;
    }

    /**
     * Funcion que reutiliza la funcion MostrarAtributos de la clase país, muestra los atributos de cada pais que posee el mundo.
     */
    public function MostrarMundo()
    {
        foreach($this->array as $obj)
        {
            $pais = new Pais ("nombre","capital","region");
            $pais->__construct($obj->name,$obj->capital,$obj->region);
            echo "{$pais->MostrarAtributos()} <br>";
        }
    }

    /**
     * Funcion para buscar algun atributo del pais con un parametro determinado, el primer parametro
     * $buscar puede ser "name, region o capital" el segundo parametro es lo que se busca.
     */
    public function BuscarNombreCapitalRegion($buscar,$lugar)
    {
        foreach ($this->array as $obj)
        {
            if ($obj->$buscar==$lugar)
            {
                $pais = new Pais ("nombre","capital","region");
                $pais->__construct($obj->name,$obj->capital,$obj->region);
                echo "{$pais->MostrarAtributos()}, <br>";
            }
        } 
    }

}