<?php

/**
 * @Author: Javier Puertas
 */

include_once "Ave.php";

class Canario extends Ave {
    public function __construct($sexo = "M") {
        parent::__construct($sexo);
    }
    
    // Métodos fábrica
    public static function consSexo($sexo) {
        return new self($sexo);
    }
    
    public static function consFull($sexo, $nombre) {
        $obj = new self($sexo);
        $obj->setNombre($nombre);
        return $obj;
    }
    
    // El canario come alpiste
    public function alimentarse($comida = "") {
        echo $this->getNombreClass() . ": Estoy comiendo alpiste<br>";
    }
    
    public function pia() {
        echo $this->getNombreClass() . ": Pio pio pio<br>";
    }
    
    protected function getNombreClass() {
        return "Canario" . ($this->nombre != "" ? " " . $this->nombre : "");
    }
    
    public function __toString() {
        return "Soy un Animal, un Ave, en concreto un Canario, con sexo " . $this->getSexoCompleto() . ", llamado " . $this->nombre . "<br>";
    }

    public function ponerHuevo($especie = "") {
        parent::ponerHuevo("Canario");
    }
}

?>