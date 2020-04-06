<?php
include_once './interface.php';
class PaisesAmericanos extends Pais implements IInterface
{
    public $callingCode;
    public $idioma;
    public $population;

    public function __construct ($name,$capital,$region,$idioma,$callingCode,$population) 
    {
        parent::__construct($name,$capital,$region);
        $this->idioma=$idioma;
        $this->callingCode=$callingCode;
        $this->population = $population;
    }

    public function MostrarAtributos()
    {
        $string = parent ::MostrarAtributos();
        $string .= "su idioma es: "; 
        
        foreach ($this->idioma as $lang)
        {
            $string .= "{$lang->name}, ";
        }

        $string .= "su codigo: ";

        //print_r($this->callingCode);
        foreach ($this->callingCode as $code)
        {
            $cadena = print_r($code,true);
            $string .= "{$cadena}, ";
        }
        
        return $string;
    }

    public function MostrarPopulation()
    {
       echo " su poblacion es de: {$this->population} habitantes<br>";  
    }

}
