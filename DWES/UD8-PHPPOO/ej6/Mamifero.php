<?php

/**
 * @Author: Javier Puertas
 */

include_once "Animal.php";

abstract class Mamifero extends Animal {
    protected $raza;
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
    
    public function __toString() {
        $nombreText = ($this->nombre != "") ? " y mi nombre es " . $this->nombre : " y no tengo nombre";
        $razaText = ($this->raza != "") ? ", raza " . $this->raza : " raza";
        return parent::__toString() . "un Mamífero, en concreto un " . $this->getClase() . ", con sexo " . $this->getSexoCompleto() . $razaText . $nombreText . "<br> \n";
    }

    abstract function getClase();
}
?>
