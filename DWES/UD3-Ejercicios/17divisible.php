<?php

/**
 * @Author: Javier Puertas
 */

// Realiza un programa que diga si un número introducido por teclado es par y/o divisible entre 3

$numero = readline("Dime un número: ");

if ($numero % 2 == 0) {
    echo "Es par.";
}
// divisible entre 3
if ($numero % 3 == 0) {
    echo " Es divisible entre 3";
}

echo "\n";

?>