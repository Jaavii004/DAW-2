<?php
include_once "Animal.php";

// Subclase abstracta Ave
abstract class Ave extends Animal {
    protected static $totalAves = 0;
    
    public function __construct($sexo = "M") {
        parent::__construct($sexo);
        self::$totalAves++;
    }
    
    public static function getTotalAves() {
        return "Hay un total de " . self::$totalAves . " aves<br>";
    }
    
    public function ponerHuevo() {
        echo get_class($this) . " " . $this->nombre . ": ";
        echo $this->sexo === "H" ? "He puesto un huevo!<br>" : "Soy macho, no puedo poner huevos<br>";
    }
    
    public function __toString() {
        return parent::__toString() . ", un Ave";
    }
}
?>
