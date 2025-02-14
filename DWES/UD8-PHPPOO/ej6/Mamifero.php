<?php
include_once "Animal.php";

// Subclase abstracta Mamifero
abstract class Mamifero extends Animal {
    protected static $totalMamiferos = 0;
    
    public function __construct($sexo = "M") {
        parent::__construct($sexo);
        self::$totalMamiferos++;
    }
    
    public static function getTotalMamiferos() {
        return "Hay un total de " . self::$totalMamiferos . " mamíferos<br>";
    }
    
    public function amamantar() {
        echo get_class($this) . " " . $this->nombre . ": ";
        echo $this->sexo === "H" ? "Amamantando a mis crias<br>" : "Soy macho, no puedo amamantar<br>";
    }
    
    public function __toString() {
        return parent::__toString() . ", un Mamífero";
    }
}

?>
