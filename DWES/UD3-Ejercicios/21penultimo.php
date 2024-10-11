<?php

/**
 * @Author: Javier Puertas
 */

// Escribe un programa que diga cuál es la penúltima cifra de un número entero introducido por
// teclado. Se permiten números de hasta 5 cifras. Puedes usar la función creada para el ejercicio 19

$numero = readline("Dime un número: ");

$numero_separado = str_split($numero);

if ($numero >= 99999) {
    echo "El número tiene mas de 5 cifras";
} else {
    echo "El penultimo dijito es: ".$numero_separado[count($numero_separado)-2];
}

echo "\n";

?>