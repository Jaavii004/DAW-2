<?php

/**
 * @Author: Javier Puertas
 */

// Elabora un programa que lea un número entero y escriba el número resultante de invertir el
// orden de sus cifras Puedes usar la función creada para el ejercicio 1


$numero = readline("Dime un numero: ");

$numero_separado = str_split($numero);

echo "Numero invertido: ";
for ($i = count($numero_separado)-1; $i >= 0; $i--) { 
    echo $numero_separado[$i];
}

echo "\n";

?>