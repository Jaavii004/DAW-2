<?php

/**
 * @Author: Javier Puertas
 */

// Calcula, dada la fecha y hora actual y la fecha y hora deseada, cuántas horas y minutos quedan
// para dicho momento.

$entradaUsuario = readline("Introduce la fecha y hora deseada en formato 'YYYY-MM-DD HH:MM:SS': ");

// Obtiene la fecha y hora actual
$fechaActual = new DateTime();

// Creamos una fecha con la entrada del usuario
$fechaDeseada = new DateTime($entradaUsuario);

// Verifica si la fecha deseada es válida
if ($fechaDeseada) {
    // Calcula la diferencia entre la fecha actual y la fecha deseada
    $diferencia = $fechaActual->diff($fechaDeseada);

    $horas = $diferencia->days * 24 + $diferencia->h;
    $minutos = $diferencia->i;

    echo "Faltan $horas horas y $minutos minutos para la fecha y hora deseada.\n";
} else {
    echo "Formato de fecha incorrecto. Por favor, usa 'YYYY-MM-DD HH:MM:SS'.\n";
}


?>