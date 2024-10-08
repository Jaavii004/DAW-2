<?php

/**
 * @Author: Javier Puertas
 */

$entradaUsuario = readline("Introduce la fecha y hora deseada en formato 'YYYY-MM-DD HH:MM:SS': ");

$fechaActual = new DateTime();

$fechaDeseada = new DateTime($entradaUsuario);

if ($fechaDeseada) {
    $diferencia = $fechaActual->diff($fechaDeseada);

    $horas = $diferencia->days * 24 + $diferencia->h;
    $minutos = $diferencia->i;

    echo "Faltan $horas horas y $minutos minutos para la fecha y hora deseada.\n";
} else {
    echo "Formato de fecha incorrecto. Por favor, usa 'YYYY-MM-DD HH:MM:SS'.\n";
}


?>