<?php

/**
 * @Author: Javier Puertas
 */

// Diseñar la función operaMatriz, a la que se le pasa dos matrices de enteros positivos mayores de
// 0 y la operación que se desea realizar: sumar, restar, multiplicar o dividir (mediante un carácter:
// 's', 'r', 'm', 'd'). La función debe imprimir las matrices originales, indicar la operación a realizar y
// la matriz con los resultados

function operaMatriz($matriz1, $matriz2, $operacion) {
    // Inicializar la matriz resultado
    $resultado = [];
    
    // Determinar la operación a realizar
    switch ($operacion) {
        case 's':
            for ($i = 0; $i < count($matriz1); $i++) {
                for ($j = 0; $j < count($matriz1[0]); $j++) {
                    $resultado[$i][$j] = $matriz1[$i][$j] + $matriz2[$i][$j];
                }
            }
            $operacion_str = "suma";
            break;
        case 'r':
            for ($i = 0; $i < count($matriz1); $i++) {
                for ($j = 0; $j < count($matriz1[0]); $j++) {
                    $resultado[$i][$j] = $matriz1[$i][$j] - $matriz2[$i][$j];
                }
            }
            $operacion_str = "resta";
            break;
        case 'm':
            for ($i = 0; $i < count($matriz1); $i++) {
                for ($j = 0; $j < count($matriz2[0]); $j++) {
                    $resultado[$i][$j] = 0;
                    for ($k = 0; $k < count($matriz2); $k++) {
                        $resultado[$i][$j] += $matriz1[$i][$k] * $matriz2[$k][$j];
                    }
                }
            }
            $operacion_str = "multiplicación";
            break;
        case 'd':
            for ($i = 0; $i < count($matriz1); $i++) {
                for ($j = 0; $j < count($matriz1[0]); $j++) {
                    $resultado[$i][$j] = $matriz1[$i][$j] / $matriz2[$i][$j];
                }
            }
            $operacion_str = "división";
            break;
        default:
            echo "Operación no válida.\n";
            return;
    }

    // Imprimir el resultado
    echo "Resultado de la $operacion_str:\n";
    foreach ($resultado as $filas) {
        echo implode(", ", $filas) . "\n";
    }
}

// Ejemplo de uso
$matriz1 = [[1, 2], [3, 2]];
$matriz2 = [[1, 2], [1, 2]];

operaMatriz($matriz1, $matriz2, 'r');

?>
