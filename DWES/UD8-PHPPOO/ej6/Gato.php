<?php

/**
 * @Author: Javier Puertas
 */

include_once "Mamifero.php";

class Gato extends Mamifero {
    private $raza;

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
    
    public function alimentarse($comida = "") {
        echo $this->getNombreClass() . ": Estoy comiendo pescado<br> \n";
    }
    
    public function maulla() {
        echo $this->getNombreClass() . ": Miauuuu<br>  \n";
    }
    
    protected function getNombreClass() {
        return "Gato " . $this->nombre;
    }
    
    public function __toString() {
        $nombreText = ($this->nombre != "") ? ", mi nombre es " . $this->nombre : " y no tengo nombre";
        $razaText = ($this->raza != "") ? ", raza " . $this->raza : " raza";
        return "Soy un Animal, un Mamífero, en concreto un Gato, con sexo " . $this->getSexoCompleto() . $razaText . $nombreText . "<br> \n";
    }
}
?>
