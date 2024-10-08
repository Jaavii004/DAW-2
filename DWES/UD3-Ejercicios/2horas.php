<?php

/**
 * @Author: Javier Puertas
 */

$daysOfWeek = array('Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo');

echo "Fecha actual: " . date('Y-m-d H:i:s') . "\n";
echo "Día de la semana: " . $daysOfWeek[date('N') - 1];

echo "\n";
?>