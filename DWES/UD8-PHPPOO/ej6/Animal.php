<?php
abstract class Animal {
    protected $sexo;
    protected static $totalAnimales = 0;
    protected $nombre;

    public function __construct($sexo = 'M') {
        $this->sexo = $sexo;
        self::$totalAnimales++;
    }

    public static function consSexo($sexo) {
        return new static($sexo);
    }

    public static function consFull($sexo, $nombre) {
        $animal = new static($sexo);
        $animal->nombre = $nombre;
        return $animal;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function dormirse() {
        echo get_class($this) . ($this->nombre ? " " . $this->nombre : "") . ": Zzzzzzz<br>";
    }

    public function alimentarse($comida) {
        echo get_class($this) . ($this->nombre ? " " . $this->nombre : "") . ": Estoy comiendo $comida<br>";
    }

    public function morirse() {
        echo get_class($this) . ($this->nombre ? " " . $this->nombre : "") . ": Adiós!<br>";
        self::$totalAnimales--;
    }

    public static function getTotalAnimales() {
        return "Hay un total de " . self::$totalAnimales . " animales<br>";
    }

    public function __toString() {
        return "Soy un Animal, en concreto un " . get_class($this) . ", con sexo " . ($this->sexo == 'H' ? 'HEMBRA' : 'MACHO') . ($this->nombre ? ", llamado " . $this->nombre : "") . "<br>";
    }
}
?>