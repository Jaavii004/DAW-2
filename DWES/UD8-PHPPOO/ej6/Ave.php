<?php

/**
 * @Author: Javier Puertas
 */

include_once "Animal.php";

abstract class Ave extends Animal {
    static protected $totalAves = 0;
    
    public function __construct($sexo = "M") {
        parent::__construct($sexo);
        self::$totalAves++;
    }
    
    public function morirse() {
        self::$totalAves--;
        parent::morirse(); // Llama al método de Animal para reducir también totalAnimales
    }

    public static function getTotalAves() {
        return "Hay un total de " . self::$totalAves . " aves<br>";
    }

    // Método específico para las aves.
    public function ponerHuevo() {
        if ($this->sexo == "M") {
            echo static::class . " " . ($this->nombre ?: "") . ": Soy macho, no puedo poner huevos<br>";
        } else {
            echo static::class . " " . ($this->nombre ?: "") . ": He puesto un huevo!<br>";
        }
    }
}
?>
