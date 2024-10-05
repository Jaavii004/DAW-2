<?php

/**
 * @Author: Javier Puertas
 */

$duracion = readline("Introduce la duración de la llamada en minutos: ");


if ($duracion <= 3) {
    echo "El coste de la llamada es de 0.10€";
} else {
    echo "El coste de la llamada es de " . (0.10 + ($duracion - 3) * 0.05) . "€";
}


?>