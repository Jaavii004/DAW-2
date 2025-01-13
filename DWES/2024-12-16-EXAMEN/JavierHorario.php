<?php

/**
 * @Author: Javier Puertas
 */

$horario = [
    'Lunes' => [
        '14:10' => 'DWEC',
        '15:05' => 'DWEC',
        '16:00' => 'DWES',
        '16:55' => 'P',
        '17:15' => 'DWES',
        '18:10' => 'EIE',
        '19:05' => 'DAW',
        '20:00' => 'DAW'
    ],
    'Martes' => [
        '14:10' => 'DWEC',
        '15:05' => 'DWEC',
        '16:00' => 'DIW',
        '16:55' => 'A',
        '17:15' => 'DIW',
        '18:10' => 'DWES',
        '19:05' => 'DWES',
        '20:00' => '--'
    ],
    'Miércoles' => [
        '14:10' => '--',
        '15:05' => 'DWEC',
        '16:00' => 'DWEC',
        '16:55' => 'T',
        '17:15' => 'DWEC',
        '18:10' => 'DAW',
        '19:05' => 'DAW',
        '20:00' => 'TUT'
    ],
    'Jueves' => [
        '14:10' => 'DWES',
        '15:05' => 'DWES',
        '16:00' => 'EIE',
        '16:55' => 'I',
        '17:15' => 'DIW',
        '18:10' => 'DIW',
        '19:05' => 'DAW',
        '20:00' => 'DAW'
    ],
    'Viernes' => [
        '14:10' => 'EIE',
        '15:05' => 'DWES',
        '16:00' => 'DWES',
        '16:55' => 'O',
        '17:15' => 'DIW',
        '18:10' => 'DIW',
        '19:05' => '--',
        '20:00' => '--'
    ]
];

echo "|";
echo str_repeat("-", 86);
echo "|\n";

printf("%-13s", "|Horas");
foreach ($horario as $dia => $clases) {
    printf("%-15s", "|" . $dia);
}
echo "|\n|";
echo str_repeat("-", 86);
echo "|\n";

$horas = [
    '14:10',
    '15:05',
    '16:00',
    '16:55',
    '17:15',
    '18:10',
    '19:05',
    '20:00'
];

foreach ($horas as $hora) {
    printf("| %-10s", $hora);
    foreach ($horario as $dia => $clases) {
        printf("%-15s", "|" . $clases[$hora]);
    }
    echo "|\n";
}
echo "|";
echo str_repeat("-", 86);
echo "|\n";
