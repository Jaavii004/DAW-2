<?php

/**
 * @Author: Javier Puertas
 */

// Diseña un programa que determine la cantidad total a pagar por una llamada telefónica de
// acuerdo a las siguientes premisas: Toda llamada que dure menos de 3 minutos tiene un coste de
// 10 céntimos. Cada minuto adicional a partir de los 3 primeros es un paso de contador y cuesta 5
// céntimos.

$duracion = readline("Introduce la duración de la llamada en minutos: ");

if ($duracion <= 3) {
    echo "El coste de la llamada es de 0.10€";
} else {
    echo "El coste de la llamada es de " . (0.10 + ($duracion - 3) * 0.05) . "€";
}


?>