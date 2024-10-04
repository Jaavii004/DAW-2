<?php

/**
 * @Author: Javier Puertas
 */

$numeroAleatorio = rand(1, 5);
$numeroEnPalabras = ['cero', 'uno', 'dos', 'tres', 'cuatro', 'cinco'];

echo $numeroAleatorio . ' - ' . $numeroEnPalabras[$numeroAleatorio];

echo "\n";
?>