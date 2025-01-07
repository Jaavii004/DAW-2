<?php
// Definir el horario como un array multidimensional
$horario = [
    'Lunes' => [
        '08:00' => 'Matemáticas',
        '09:00' => 'Física',
        '10:00' => 'Química',
        '11:00' => 'Historia',
    ],
    'Martes' => [
        '08:00' => 'Lengua',
        '09:00' => 'Geografía',
        '10:00' => 'Biología',
        '11:00' => 'Filosofía',
    ],
    'Miércoles' => [
        '08:00' => 'Matemáticas',
        '09:00' => 'Física',
        '10:00' => 'Inglés',
        '11:00' => 'Deportes',
    ],
    'Jueves' => [
        '08:00' => 'Arte',
        '09:00' => 'Química',
        '10:00' => 'Historia',
        '11:00' => 'Música',
    ],
    'Viernes' => [
        '08:00' => 'Tecnología',
        '09:00' => 'Filosofía',
        '10:00' => 'Lengua',
        '11:00' => 'Matemáticas',
    ],
];

// Imprimir encabezado
printf("%-15s", "Horas");
foreach ($horario as $dia => $clases) {
    printf("%-20s", $dia);
}
echo "\n";

// Imprimir las filas con los horarios
$horas = array_keys($horario['Lunes']); // Usamos las horas del lunes

foreach ($horas as $hora) {
    printf("%-15s", $hora); // Imprimir hora
    foreach ($horario as $clases) {
        // Imprimir el módulo correspondiente para esa hora y día
        printf("%-20s", isset($clases[$hora]) ? $clases[$hora] : '');
    }
    echo "\n";
}