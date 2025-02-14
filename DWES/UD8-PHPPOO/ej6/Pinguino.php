<?php
include_once "Ave.php";

class Pinguino extends Ave {
    public function pia() {
        echo "Pingüino" . ($this->nombre ? " " . $this->nombre : "") . ": Soy un pingüino programando en PHP<br>";
    }

    public function alimentarse() {
        parent::alimentarse("peces");
    }

    public function programar() {
        echo "Pingüino" . ($this->nombre ? " " . $this->nombre : "") . ": Soy un pingüino programandor en PHP<br>";
    }
}
?>