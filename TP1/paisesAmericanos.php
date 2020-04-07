<?php
include_once './interface.php';
/**
 * Clase PaisesAmericanos extiende de Pais e implementa IInterface
 */
class PaisesAmericanos extends Pais implements IInterface
{
    public $callingCode;
    public $idioma;
    public $population;
    public static $america= "America";

    /**
     * Constructor de PaisesAmericanos recibe los parametros, utiliza al constructor de la clase base Pais.
     */
    public function __construct ($name,$capital,$region,$idioma,$callingCode,$population) 
    {
        parent::__construct($name,$capital,$region);
        $this->idioma=$idioma;
        $this->callingCode=$callingCode;
        $this->population = $population;
    }

    /**
     * Funcion MostrarAtributos que reutiliza la de la clase base Pais y muestra mas atributos.
     */
    public function MostrarAtributos()
    {
        $string = parent ::MostrarAtributos();
        $string .= "su idioma es: "; 
        
        foreach ($this->idioma as $language)
        {
            $string .= "{$language->name}, ";
        }

        $string .= "su codigo: ";

        //print_r($this->callingCode);
        foreach ($this->callingCode as $code)
        {
            //echo $code;
            //$cadena = print_r($code,true);
            $string .= "{$code}, ";
        }
        
        return $string;
    }

    /**
     * Funcion que muestra la poblacion de un Pais Americano.
     */
    public function MostrarPopulation()
    {
       echo " su poblacion es de: {$this->population} habitantes<br>";  
    }

    /**
     * Metodo estatico de la clase PaisesAmericanos.
     */
    public static function MetodoEstatico()
    {
        $string = self::$america;
        return "Todos estos paises pertenecen a: {$string}";
    }

}
