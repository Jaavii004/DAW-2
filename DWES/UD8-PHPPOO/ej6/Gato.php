<?php

/**
 * @Author: Javier Puertas
 */

include_once "Mamifero.php";

class Gato extends Mamifero {

    public function __construct($sexo = "M", $raza = "") {
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
    
    public function alimentarse($comida = "pescado") {
        echo "Gato " . $this->nombre . parent::alimentarse($comida);
    }
    
    public function maulla() {
        echo "Gato " . $this->nombre . ": Miauuuu<br>  \n";
    }

    public function morirse() {
        echo "Gato " . $this->nombre . parent::morirse();
    }

    public function amamantar() {
        echo "Gato " . parent::amamantar();
    }

    public function __toString() {
        $nombreText = ($this->nombre != "") ? " y mi nombre es " . $this->nombre : " y no tengo nombre";
        $razaText = ($this->raza != "") ? ", raza " . $this->raza : " raza";
        return parent::__toString() . " Gato, con sexo " . $this->getSexoCompleto() . $razaText . $nombreText . "<br> \n";
    }
}
?>
