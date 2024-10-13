<?php

/**
 * @Author: Javier Puertas
 */

// Crea un programa para leer las notas de los alumnos de una clase, y que informe del número de
// alumnos cuya nota sea mayor de la media de la clase.

$numeroAlumnos = readline("Dime el numero ");

$notas = [];

for ($i = 0; $i < $numeroAlumnos; $i++) {
    $nota = readline("Introduce la nota del alumno " . ($i+1) . ": ");
    $notas[] = $nota;
}

$media = array_sum($notas) / count($notas);

$alumnosArribaMedia = 0;
for ($i = 0; $i < count($notas); $i++) {
    if ($notas[$i] > $media) {
        $alumnosArribaMedia++;
    }
}

echo "La media es ". $media ." y hay ". $alumnosArribaMedia ." que estan encima de la media.";

echo "\n";

?>