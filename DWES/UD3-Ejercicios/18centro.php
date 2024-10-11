<?php

/**
 * @Author: Javier Puertas
 */

// Escribe un programa que diga cuál es la cifra que está en el centro (o las dos del centro si el
// número de cifras es par) de un número entero introducido por teclado

$numero = readline("Dime un numero y te digo el del centro: ");

$numero_separado = str_split($numero);

$cantidad_numeros = count($numero_separado);

$digito_central = $cantidad_numeros / 2;

if ($cantidad_numeros % 2 == 0) {
    echo $numero_separado[$digito_central-1];
    echo $numero_separado[$digito_central];
} else {
    echo $numero_separado[$digito_central];
}

echo "\n";

?>