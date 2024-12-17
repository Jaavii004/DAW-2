<?php

/**
 * @Author: Javier Puertas
 */

// Pide al usuario un año y determina si es bisiesto. 
// Muestra un mensaje indicando si lo es o no.

function CalcularBisiesto($anio) {
    if ( ($anio % 4 == 0 && $anio % 100 != 0) || $anio % 400 == 0) {
        return true;
    }

    return false;
}

$anio = ReadLine("dime anio");

if (CalcularBisiesto($anio)) {
    echo "El año " . $anio. " es bisiesto.";
} else {
    echo "El año " . $anio . " no es bisiesto.";
}


?>