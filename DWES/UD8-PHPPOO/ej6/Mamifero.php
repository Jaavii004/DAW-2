<?php

/**
 * @Author: Javier Puertas
 */

include_once "Animal.php";

abstract class Mamifero extends Animal {
    static protected $totalMamiferos = 0;
    
    public function __construct($sexo = "M") {
        parent::__construct($sexo);
        self::$totalMamiferos++;
    }
    
    public function morirse() {
        self::$totalMamiferos--; // Restamos un mamífero
        parent::morirse(); // Restamos un animal
    }
    
    public static function getTotalMamiferos() {
        return "Hay un total de " . self::$totalMamiferos . " mamíferos<br>";
    }

    // Método propio de los mamíferos.
    public function amamantar() {
        if ($this->sexo == "M") {
            echo static::class . " " . ($this->nombre ?: "") . ": Soy macho, no puedo amamantar<br>";
        } else {
            echo static::class . " " . ($this->nombre ?: "") . ": Amamantando a mis crias<br>";
        }
    }
}
?>
