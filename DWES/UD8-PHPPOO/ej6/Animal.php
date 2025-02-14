<?php

/**
 * @Author: Javier Puertas
 */
abstract class Animal {
    protected static $totalAnimales = 0;
    protected $sexo;
    protected $nombre;
    
    public function __construct($nombre, $sexo = "M") {
        $this->nombre = $nombre;
        $this->sexo = strtoupper($sexo) === "H" ? "H" : "M";
        self::$totalAnimales++;
    }
    
    public static function getTotalAnimales() {
        return "Hay un total de " . self::$totalAnimales . " animales<br>";
    }
    
    public function dormirse() {
        echo get_class($this) . " ". $this->nombre . ": Zzzzzzz<br>";
    }
    
    public function alimentarse() {
        echo get_class($this) . " " . $this->nombre . ": Estoy comiendo<br>";
    }
    
    public function morirse() {
        self::$totalAnimales--;
        echo get_class($this) . " " . $this->nombre . ": Adiós!<br>";
    }
    
    public function __toString() {
        return "Soy un Animal, con sexo " . ($this->sexo === "H" ? "HEMBRA" : "MACHO") . "<br>";
    }
}