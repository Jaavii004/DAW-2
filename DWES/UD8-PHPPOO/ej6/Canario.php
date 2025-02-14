<?php
include_once "Ave.php";

class Canario extends Ave {
    public function pia() {
        echo "Canario" . ($this->nombre ? " " . $this->nombre : "") . ": Pio pio pio<br>";
    }

    public function alimentarse() {
        parent::alimentarse("alpiste");
    }
}

?>