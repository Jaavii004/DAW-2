<?php

/**
 * @Author: Javier Puertas
 */

// Mostrar si un número es par o impar
// Descripción: Pide un número al usuario y muestra un mensaje indicando si el número es par o impar.


$numero = 12;

if ($numero % 2 == 0) {
    echo "El numero " . $numero . ": es par";
} else {
    echo "El numero " . $numero . ": es impar";
}

?>