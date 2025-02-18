<?php

/**
 * @Author: Javier Puertas
 */

abstract class Animal {
    protected $sexo;
    protected $nombre = "";
    static protected $totalAnimales = 0;
    
    public function __construct($sexo = "M") {
        $this->sexo = $sexo;
        self::$totalAnimales++;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getNombre() {
        return $this->nombre . " \n";
    }
    
    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getSexo() {
        return $this->sexo . " \n";
    }
    
    protected function getSexoCompleto() {
        return ($this->sexo == "H") ? "HEMBRA" : "MACHO";
    }
    
    public function dormirse() {
        echo $this->getNombreClass() . ": Zzzzzzz<br> \n";
    }
    
    public function alimentarse($comida = "") {
        echo $this->getNombreClass() . ": Estoy comiendo " . $comida . "<br> \n";
    }
    
    public function morirse() {
        echo $this->getNombreClass() . ": Adiós!<br> \n";
        self::$totalAnimales--;
    }

    public static function getTotalAnimales() {
        return "Hay un total de " . self::$totalAnimales . " animales<br> \n";
    }

    abstract protected function getNombreClass();

    public function __toString(){
        return "Soy un Animal, ";
    }
}
?>