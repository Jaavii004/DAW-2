<?php
include_once "Mamifero.php";


class Perro extends Mamifero {
    protected $raza;

    public function __construct($sexo = 'M', $nombre = null, $raza = null) {
        parent::__construct($sexo);
        $this->nombre = $nombre;
        $this->raza = $raza;
    }

    public static function consSexoNombre($sexo, $nombre) {
        return new static($sexo, $nombre);
    }

    public static function consFull($sexo, $nombre, $raza) {
        return new static($sexo, $nombre, $raza);
    }

    public function ladra() {
        echo "Perro" . ($this->nombre ? " " . $this->nombre : "") . ": Guau guau<br>";
    }

    public function alimentarse() {
        parent::alimentarse("carne");
    }

    public function __toString() {
        return parent::__toString() . "Soy un Perro, raza " . ($this->raza ? $this->raza : "desconocida") . "<br>";
    }
}
?>