<?php
class Vehiculo {
    public static $vehiculosCreados = 0;
    public static $kilometrosTotales = 0;
    public $kilometrosRecorridos = 0;

    public function __construct() {
        self::$vehiculosCreados++;
    }

    public function avanza($km) {
        $this->kilometrosRecorridos += $km;
        self::$kilometrosTotales += $km;
    }

    public function verKMRecorridos() {
        return "Kilómetros recorridos por ";
    }

    public static function verKMTotales() {
        return "Kilómetros totales recorridos por todos los vehículos: " . self::$kilometrosTotales . " km";
    }

    public static function verVehiculosCreados() {
        return "Número total de vehículos creados: " . self::$vehiculosCreados;
    }
}
?>
