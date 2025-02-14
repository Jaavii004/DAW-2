<?php
include_once "Ave.php";

// Clase Pingüino
class Pinguino extends Ave {
    protected $nombre;
    
    public function __construct($sexo = "M", $nombre = "") {
        parent::__construct($sexo);
        $this->nombre = $nombre;
    }
    
    public function pia() {
        echo "Pingüino " . $this->nombre . ": Soy un pingüino programando en PHP<br>";
    }
    
    public function alimentarse() {
        echo "Pingüino " . $this->nombre . ": Estoy comiendo peces<br>";
    }
}
?>
