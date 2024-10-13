<?php

/**
 * @Author: Javier Puertas
 */

// Elabora un programa para determinar si una hora leída en la forma horas, minutos y segundos
// está correctamente expresada. 

$horas = readline("Introduce las horas: ");
$minutos = readline("Introduce los minutos: ");
$segundos = readline("Introduce los segundos: ");

if ($horas >= 0 && $horas <= 23 && $minutos >= 0 && $minutos <= 59 && $segundos >= 0 && $segundos <= 59) {
    echo "La hora es válida.";
} else {
    echo "La hora no es válida.";
}

?>