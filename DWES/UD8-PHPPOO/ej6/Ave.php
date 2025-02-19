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
        return parent::morirse();
    }

    public static function getTotalAves() {
        return "Hay un total de " . self::$totalAves . " aves<br> \n";
    }

    public function ponerHuevo($especie) {
        if ($this->sexo == "M") {
            echo $especie . " " . $this->nombre . ": Soy macho, no puedo poner huevos<br> \n";
        } else {
            echo $especie . " " . $this->nombre . ": He puesto un huevo!<br> \n";
        }
    }

    public function __toString() {
        return parent::__toString() . "un Ave, en concreto un ";
        // " . $this->getClase() . ", con sexo " . $this->getSexoCompleto() . ", llamado " . $this->nombre . "<br> \n";
    }

}
?>
