<?php
include_once "Animal.php";

abstract class Ave extends Animal {
    protected static $totalAves = 0;

    public function __construct($sexo = 'M') {
        parent::__construct($sexo);
        self::$totalAves++;
    }

    public function ponerHuevo() {
        if ($this->sexo == 'H') {
            echo get_class($this) . ($this->nombre ? " " . $this->nombre : "") . ": He puesto un huevo!<br>";
        } else {
            echo get_class($this) . ($this->nombre ? " " . $this->nombre : "") . ": Soy macho, no puedo poner huevos<br>";
        }
    }

    public static function getTotalAves() {
        return "Hay un total de " . self::$totalAves . " aves<br>";
    }

    public function __toString() {
        return parent::__toString() . "Soy un Ave<br>";
    }
}
?>