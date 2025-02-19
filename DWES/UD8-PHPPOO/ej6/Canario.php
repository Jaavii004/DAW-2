<?php

/**
 * @Author: Javier Puertas
 */

include_once "Ave.php";

class Canario extends Ave {
    public function __construct($sexo = "M", $nombre = "") {
        parent::__construct($sexo);
        $this->nombre = $nombre;
    }

    // public function __construct($sexo = "M") {
    //     parent::__construct($sexo);
    // }

    public static function consSexo($sexo) {
        return new self($sexo);
    }
    
    public static function consFull($sexo, $nombre) {
        $obj = new self($sexo);
        $obj->setNombre($nombre);
        return $obj;
    }
    
    public function alimentarse($comida = "alpiste") {
        echo "Canario " . $this->nombre . parent::alimentarse($comida);
    }
    
    public function pia() {
        echo "Canario " . $this->nombre . ": Pio pio pio<br> \n";
    }

    public function getClase() {
        return "Canario";
    }

    public function ponerHuevo($especie = "") {
        parent::ponerHuevo("Canario");
    }

    public function morirse() {
        echo "Canario " . $this->nombre . parent::morirse();
    }

    public function __toString() {
        return parent::__toString() . "Canario, con sexo " . $this->getSexoCompleto() . ", llamado " . $this->nombre . "<br> \n";
    }
}

?>