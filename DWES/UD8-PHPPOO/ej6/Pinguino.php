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
    
    public function alimentarse($comida = "") {
        echo $this->getNombreClass() . ": Estoy comiendo peces<br> \n";
    }
    
    public function programar() {
        echo $this->getNombreClass() . ": Soy un pingüino programandor en PHP<br> \n";
    }
    
    protected function getNombreClass() {
        return "Pingüino " . $this->nombre;
    }
    public function getClase() {
        return "Pingüino";
    }

    public function ponerHuevo($especie = "") {
        parent::ponerHuevo("Pingüino");
    }

    public function __toString() {
        return parent::__toString() . " Pingüino" . $this->getSexoCompleto() . ", llamado " . $this->nombre . "<br> \n";
    }
}
?>