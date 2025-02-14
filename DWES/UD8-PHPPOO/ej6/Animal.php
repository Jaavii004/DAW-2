<?php

/**
 * @Author: Javier Puertas
 */

abstract class Animal {
    protected $sexo;
    protected $nombre = "";
    static protected $totalAnimales = 0;
    
    public function __construct($sexo) {
        $this->sexo = $sexo;
        self::$totalAnimales++;
    }
    
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    
    public function getNombre() {
        return $this->nombre;
    }
    
    public function getSexo() {
        return $this->sexo;
    }
    
    protected function getSexoCompleto() {
        return ($this->sexo == "H") ? "HEMBRA" : "MACHO";
    }
    
    public function dormirse() {
        echo $this->getClassIdentifier() . ": Zzzzzzz<br>";
    }
    
    public function alimentarse($comida = "") {
        echo $this->getClassIdentifier() . ": Estoy comiendo " . $comida . "<br>";
    }
    
    public function morirse() {
        echo $this->getClassIdentifier() . ": Adiós!<br>";
        self::$totalAnimales--;
    }
    
    public static function getTotalAnimales() {
        return "Hay un total de " . self::$totalAnimales . " animales<br>";
    }
    
    abstract protected function getClassIdentifier();
    
    abstract public function __toString();
}
?>