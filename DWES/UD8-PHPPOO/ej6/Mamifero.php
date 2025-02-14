<?php
include_once "Animal.php";
abstract class Mamifero extends Animal {
    protected static $totalMamiferos = 0;

    public function __construct($sexo = 'M') {
        parent::__construct($sexo);
        self::$totalMamiferos++;
    }

    public function amamantar() {
        if ($this->sexo == 'H') {
            echo get_class($this) . ($this->nombre ? " " . $this->nombre : "") . ": Amamantando a mis crias<br>";
        } else {
            echo get_class($this) . ($this->nombre ? " " . $this->nombre : "") . ": Soy macho, no puedo amamantar<br>";
        }
    }

    public static function getTotalMamiferos() {
        return "Hay un total de " . self::$totalMamiferos . " mamíferos<br>";
    }

    public function __toString() {
        return parent::__toString() . "Soy un Mamífero<br>";
    }
}
?>