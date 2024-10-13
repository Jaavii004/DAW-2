<?php

/**
 * @Author: Javier Puertas
 */

// Crea un programa que reciba una hora expresada en segundos transcurridos desde las 12 de la
// noche y la convierta en horas, minutos y segundos

$segundos = readline("Introduce los segundos: ");

// redondeamos hacia abajo
$horas = floor($segundos / 3600);
$minutos = floor(($segundos % 3600) / 60);
$seg = $segundos % 60;

echo "$horas horas, $minutos minutos y $seg segundos.";

?>