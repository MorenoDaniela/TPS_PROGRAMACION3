<?php

class Mundo
{
    public $array;

    public function __construct($array)
    {
        $this->array = $array;
    }

    public function MostrarMundo()
    {
        foreach($this->array as $obj)
        {
            $pais = new Pais ("nombre","capital","region");
            $pais->__construct($obj->name,$obj->capital,$obj->region);
            echo "{$pais->MostrarAtributos()} <br>";
        }
    }
    
}