<?php
/**
 * Clase base Pais
 */
class Pais
{
    public $nombre;
    public $capital;
    public $region;

    /**
     * Constructor de la clase Pais, recibe 3 parametros.
     */
    public function __construct ($name,$capital,$region)
    {
        $this->nombre=$name;
        $this->capital=$capital;
        $this->region=$region;
    }

    /**
     * Metodo de instancia que muestra los atributos de la clase.
     */
    public function MostrarAtributos()
    {
        return "El pais {$this->nombre} tiene de capital a {$this->capital} y su region es {$this->region} ";
    }
    
}

