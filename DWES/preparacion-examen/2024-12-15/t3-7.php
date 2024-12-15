<?php

/**
 * @Author: Javier Puertas
 */

$fechaInput = "12-12-2024";

$fechaFin = "13-12-2024";


function DiferenciasHoras($fechaInicio, $fechaFin) {
    // Separar las fechas en día, mes y año
    $myarrayfechaInicio = explode("-", $fechaInicio);
    $myarrayfechaFin = explode("-", $fechaFin);

    // Convertir ambas fechas a días totales desde el año 0
    $diasInicio = (int)$myarrayfechaInicio[2] * 365 + (int)$myarrayfechaInicio[1] * 30 + (int)$myarrayfechaInicio[0];
    $diasFin = (int)$myarrayfechaFin[2] * 365 + (int)$myarrayfechaFin[1] * 30 + (int)$myarrayfechaFin[0];

    // Calcular la diferencia en días
    $diferenciaDias = $diasFin - $diasInicio;

    // Convertir la diferencia a horas
    $horasTotales = $diferenciaDias * 24;

    $array = array($diferenciaDias, $horasTotales);
    return $array;
}

print_r(DiferenciasHoras($fechaInput, $fechaFin));

?>