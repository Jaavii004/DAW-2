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
    
    public function alimentarse($comida = "carne") {
        echo "Perro " . $this->nombre . parent::alimentarse($comida);
    }

    public function ladra() {
        echo "Perro " . $this->nombre . ": Guau guau<br>  \n";
    }

    public function amamantar() {
        echo "Perro " . parent::amamantar();
    }

    public function __toString() {
        $nombreText = ($this->nombre != "") ? " y mi nombre es " . $this->nombre : " y no tengo nombre";
        $razaText = ($this->raza != "") ? ", raza " . $this->raza : " raza";
        return parent::__toString() . " Perro, con sexo " . $this->getSexoCompleto() . $razaText . $nombreText . "<br> \n";
    }
}
?>