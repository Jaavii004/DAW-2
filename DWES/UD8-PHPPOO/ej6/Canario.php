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
    
    public static function consSexo($sexo) {
        return new self($sexo);
    }
    
    public static function consFull($sexo, $nombre) {
        $obj = new self($sexo);
        $obj->setNombre($nombre);
        return $obj;
    }
    
    public function alimentarse($comida = "") {
        echo "Canario " . $this->nombre . ": Estoy comiendo alpiste<br> \n";
    }
    
    public function pia() {
        echo "Canario " . $this->nombre . ": Pio pio pio<br> \n";
    }
    
    protected function getNombreClass() {
        return ;
    }

    public function getClase() {
        return "Canario";
    }

    public function ponerHuevo($especie = "") {
        parent::ponerHuevo("Canario");
    }
}

?>