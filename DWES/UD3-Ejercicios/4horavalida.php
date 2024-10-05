<?php

/**
 * @Author: Javier Puertas
 */

function esHoraValida($horas, $minutos, $segundos) {
    if ($horas >= 0 && $horas <= 23 && $minutos >= 0 && $minutos <= 59 && $segundos >= 0 && $segundos <= 59) {
        return "La hora es válida.";
    } else {
        return "La hora no es válida.";
    }
}

$horas = readline("Introduce las horas: ");
$minutos = readline("Introduce los minutos: ");
$segundos = readline("Introduce los segundos: ");

echo esHoraValida($horas, $minutos, $segundos);
 

?>