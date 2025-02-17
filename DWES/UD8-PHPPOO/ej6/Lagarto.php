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

    public function alimentarse($comida = "") {
        echo $this->getNombreClass() . ": Estoy comiendo insectos<br> \n";
    }
    
    public function tomarSol() {
        echo $this->getNombreClass() . ": Estoy tomando el Sol<br> \n";
    }

    protected function getNombreClass() {
        return "Lagarto " . $this->nombre;
    }
    
    public function __toString() {
        return "Soy un Animal, en concreto un Lagarto, con sexo " . $this->getSexoCompleto() . ", llamado " . $this->nombre . "<br> \n";
    }
}
?>
