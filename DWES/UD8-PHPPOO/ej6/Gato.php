<?php
include_once "Mamifero.php";

class Gato extends Mamifero {
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

    public function maulla() {
        echo "Gato" . ($this->nombre ? " " . $this->nombre : "") . ": Miauuuu<br>";
    }

    public function alimentarse() {
        parent::alimentarse("pescado");
    }

    public function __toString() {
        return parent::__toString() . "Soy un Gato, raza " . ($this->raza ? $this->raza : "desconocida") . "<br>";
    }
}
?>
