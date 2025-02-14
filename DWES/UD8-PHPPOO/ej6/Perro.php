<?php
include_once "Mamifero.php";


// Clase Perro
class Perro extends Mamifero {
    protected $nombre;
    protected $raza;
    
    public function __construct($sexo = "M", $nombre = "", $raza = "") {
        parent::__construct($sexo);
        $this->nombre = $nombre;
        $this->raza = $raza;
    }
    
    public function ladra() {
        echo "Perro " . $this->nombre . ": Guau guau<br>";
    }
    
    public function alimentarse() {
        echo "Perro " . $this->nombre . ": Estoy comiendo carne<br>";
    }
}
?>
