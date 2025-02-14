<?php
include_once "Ave.php";


// Clase Canario
class Canario extends Ave {
    protected $nombre;
    
    public function __construct($sexo = "M", $nombre = "") {
        parent::__construct($sexo);
        $this->nombre = $nombre;
    }
    
    public function pia() {
        echo "Canario " . $this->nombre . ": Pio pio pio<br>";
    }
    
    public function alimentarse() {
        echo "Canario " . $this->nombre . ": Estoy comiendo alpiste<br>";
    }
}
