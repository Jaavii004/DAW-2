<?php

/**
 * @Author: Javier Puertas
 */

/**
 * Crea una función llamada permutaciones que reciba un vector $V y que cambie la posición de
 * los elementos dicho vector haciendo permutaciones. Las permutaciones se harán entre los
 * elementos $V[$N-1] y $V[0], $V[$N-2] y $V[1] , $V[$N-3] y $V[2] etc. siendo $N el tamaño
 * del vector.
 */

function permutaciones($vector) {
    // calculamos la mitad del vector porque solo tenemos que mover de la mitad hacia la izquierda
    $mitad_vector = count($vector) / 2;
    $n = count($vector)-1;
    for ($i = 0; $i < $mitad_vector; $i++) {
        // nos guardamos el valor de la posición $i para no perderlo
        $aux = $vector[$i];
        // intercambiamos los valores por la posición contraria
        $vector[$i] = $vector[$n - $i];
        // y volvemos a poner el valor guardado en la posición contraria
        $vector[$n - $i] = $aux;
    }
    // devolvemos el vector permutado
    return $vector;
}

$vector = [1, 2, 3, 4, 5, 6, 7, 8, 9];

echo "Vector permutado: ";
print_r(permutaciones($vector));

?>