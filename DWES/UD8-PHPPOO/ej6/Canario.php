<?php

/**
 * @Author: Javier Puertas
 */

include_once "Ave.php";

class Canario extends Ave {
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
        echo $this->getNombreClass() . ": Estoy comiendo alpiste<br> \n";
    }
    
    public function pia() {
        echo $this->getNombreClass() . ": Pio pio pio<br> \n";
    }
    
    protected function getNombreClass() {
        return "Canario " . $this->nombre;
    }

    public function getClase() {
        return "Canario";
    }

    public function ponerHuevo($especie = "") {
        parent::ponerHuevo("Canario");
    }
}

?>