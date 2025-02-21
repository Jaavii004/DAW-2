<?php

/**
 * @Author: Javier Puertas
 */

include_once "Ave.php";

class Pinguino extends Ave {
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
    
    public function alimentarse($comida = "peces") {
        echo "Pingüino " . $this->getNombre() . parent::alimentarse($comida);
    }
    
    public function programar() {
        echo "Pingüino " . $this->getNombre() . ": Soy un pingüino programandor en PHP<br> \n";
    }

    public function ponerHuevo() {
        echo "Pingüino" . parent::ponerHuevo();
    }

    public function __toString() {
        return parent::__toString() . " Pingüino" . $this->getSexoCompleto() . ", llamado " . $this->getNombre() . "<br> \n";
    }
}
?>