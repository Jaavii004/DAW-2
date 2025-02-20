<?php

class Coche extends Vehiculo {
    public function llenarDeposito() {
        return "Depósito del coche lleno.\n";
    }

    public function quemaRueda() {
        echo "¡Quemando rueda con el coche!\n";
    }

    public function verKMRecorridos() {
        return parent::verKMRecorridos() . "el coche: {$this->kilometrosRecorridos} km";
    }
}
?>
