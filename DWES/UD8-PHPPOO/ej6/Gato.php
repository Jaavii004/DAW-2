<?php
include_once "Mamifero.php";

// Clase Gato
class Gato extends Mamifero {
    protected $nombre;
    protected $raza;
    
    public function __construct($sexo = "M", $nombre = "", $raza = "") {
        parent::__construct($sexo);
        $this->nombre = $nombre;
        $this->raza = $raza;
    }
    
    public function maulla() {
        echo "Gato " . $this->nombre . ": Miauuuu<br>";
    }
    
    public function alimentarse() {
        echo "Gato " . $this->nombre . ": Estoy comiendo pescado<br>";
    }
}
