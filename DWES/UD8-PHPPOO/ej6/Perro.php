<?php

/**
 * @Author: Javier Puertas
 */

include_once "Mamifero.php";

class Perro extends Mamifero {

    public function __construct($sexo = "M", $raza = "teckel") {
        parent::__construct($sexo);
        $this->raza = $raza;
    }

    public function setRaza($raza) {
        $this->raza = $raza;
    }

    public function getRaza() {
        return $this->raza;
    }

    public static function consSexoNombre($sexo, $nombre) {
        $obj = new self($sexo);
        $obj->setNombre($nombre);
        return $obj;
    }
    
    public static function consFull($sexo, $nombre, $raza) {
        $obj = new self($sexo, $raza);
        $obj->setNombre($nombre);
        return $obj;
    }
    
    public function alimentarse($comida = "") {
        echo $this->getNombreClass() . ": Estoy comiendo carne<br>  \n";
    }
    
    public function ladra() {
        echo $this->getNombreClass() . ": Guau guau<br>  \n";
    }
    
    protected function getNombreClass() {
        return "Perro " . $this->nombre;
    }

    public function getClase() {
        return "Perro";
    }
}
?>