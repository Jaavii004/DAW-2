<?php

include "Vehiculo.php";
class Bicicleta extends Vehiculo {
    public function hacerCaballito() {
        echo "¡Haciendo caballito con la bicicleta!\n";
    }

    public function ponerCadena() {
        echo "Cadena puesta en la bicicleta.\n";
    }

    public function verKMRecorridos() {
        return parent::verKMRecorridos() . "la bicicleta: {$this->kilometrosRecorridos} km";
    }
}
?>
