<?php

/**
 * @Author: Javier Puertas
 */

// Realiza un programa que nos diga cuántos dígitos tiene un número dado

$numero = readline("Dime un numero: ");

$numero_separado = str_split($numero);

$cantidad_digitos = count($numero_separado);

echo "La catidad de dígitos es de " . $cantidad_digitos;

echo "\n";

?>