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
        self::$totalMamiferos--;
        parent::morirse();
    }
    
    public static function getTotalMamiferos() {
        return "Hay un total de " . self::$totalMamiferos . " mamíferos<br> \n";
    }

    public function amamantar() {
        if ($this->sexo == "M") {
            echo static::class . " " . ($this->nombre ?: "") . ": Soy macho, no puedo amamantar<br> \n";
        } else {
            echo static::class . " " . ($this->nombre ?: "") . ": Amamantando a mis crias<br> \n";
        }
    }
}
?>
