<?php

/**
 * @Author: Javier Puertas
 */

$segundos = readline("Introduce los segundos: ");

$horas = floor($segundos / 3600);
$minutos = floor(($segundos % 3600) / 60);
$seg = $segundos % 60;

echo "$horas horas, $minutos minutos y $seg segundos.";

?>