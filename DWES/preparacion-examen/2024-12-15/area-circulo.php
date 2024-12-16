<?php

/**
 * @Author: Javier Puertas
 */


// Pide al usuario el radio de un círculo y calcula su área. 
// Muestra el resultado con un mensaje que incluya el valor del radio introducido.


$radio = 12;


function CalcularArea($radio) {
    $area = pi() * ($radio * $radio);

    return $area;
}

echo "El area del circulo con radio ". $radio . " es de " . CalcularArea($radio);


?>