<?php
include_once "Ave.php";

class Pinguino extends Ave {
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
    
    // El pingüino come peces
    public function alimentarse($comida = "") {
        echo $this->getNombreClass() . ": Estoy comiendo peces<br>";
    }
    
    public function programar() {
        echo $this->getNombreClass() . ": Soy un pingüino programandor en PHP<br>";
    }
    
    protected function getNombreClass() {
        return "Pingüino" . ($this->nombre != "" ? " " . $this->nombre : "");
    }
    
    public function __toString() {
        $nombreText = ($this->nombre != "") ? ", llamado " . $this->nombre : "";
        return "Soy un Animal, un Ave, en concreto un Pingüino, con sexo " . $this->getSexoCompleto() . $nombreText . "<br>";
    }

    public function ponerHuevo($especie = "") {
        parent::ponerHuevo("Pingüino");
    }
}
?>