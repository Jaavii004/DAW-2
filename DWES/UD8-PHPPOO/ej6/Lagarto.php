<?php

/**
 * @Author: Javier Puertas
 */

include_once "Animal.php";

class Lagarto extends Animal {
    
    public function __construct($sexo = "M") {
        parent::__construct($sexo);
    }

    public static function consSexo($sexo) {
        return new self($sexo);
    }
    
    public static function consFull($sexo, $nombre) {
        $obj = new self($sexo);
        $obj->setNombre($nombre);
        return $obj;
    }

    public function alimentarse($comida = "insectos") {
        echo "Lagarto " . $this->nombre . parent::alimentarse($comida);
    }

    public function morirse() {
        echo "Lagarto " . $this->nombre . parent::morirse();
    }

    public function dormirse() {
        echo "Lagarto " . $this->nombre . parent::dormirse();
    }

    public function tomarSol() {
        echo "Lagarto " . $this->nombre . ": Estoy tomando el Sol<br> \n";
    }

    
    public function __toString() {
        return parent::__toString() . "en concreto un Lagarto, con sexo " . $this->getSexoCompleto() . ", llamado " . $this->nombre . "<br> \n";
    }
}
?>
