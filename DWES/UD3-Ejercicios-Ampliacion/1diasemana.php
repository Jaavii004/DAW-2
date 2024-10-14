<?php

/**
 * @Author: Javier Puertas
 */

// Escribe un programa en que dado un número del 1 a 7 escriba el correspondiente nombre del
// día de la semana.


$numero = readline("Dime el número y te digo dia de la semana: ");

$diasSemana = [
    'Lunes',
    'Martes',
    'Miércoles',
    'Jueves',
    'Viernes',
    'Sábado',
    'Domingo'
];

if ($numero < 1 || $numero > 7) {
    echo "El número debe estar entre 1 y 7.";
} else {
    echo "El día de la semana correspondiente al número $numero es: " . $diasSemana[$numero - 1];
}

echo "\n";

?>