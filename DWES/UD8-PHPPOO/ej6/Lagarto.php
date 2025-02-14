<?php
include_once "Animal.php";

// Clase Lagarto
class Lagarto extends Animal {
    protected $nombre;
    
    public function __construct($sexo = "M", $nombre = "") {
        parent::__construct($sexo);
        $this->nombre = $nombre;
    }
    
    public function tomarSol() {
        echo "Lagarto " . $this->nombre . ": Estoy tomando el sol<br>";
    }
    
    public function alimentarse() {
        echo "Lagarto " . $this->nombre . ": Estoy comiendo insectos<br>";
    }
}
?>
