<?php

/**
 * @Author: Javier Puertas
 */

// Dada la fecha del sistema, indicar las horas, minutos y segundos junto con el día de la semana

$semana = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');

echo "Fecha actual: " . date('Y-m-d H:i:s') . "\n";
echo "Día de la semana: " . $semana[date('N') - 1];

echo "\n";
?>