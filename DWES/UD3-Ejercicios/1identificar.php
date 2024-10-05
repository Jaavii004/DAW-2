<?php

/**
 * @Author: Javier Puertas
 */


$caracter = readline("Introduce un caracter: ");

if (is_numeric($caracter)) {
    echo "Es un carácter numérico";
} else if (ctype_upper($caracter)) {
    echo "Es una letra mayúscula";
} else if (ctype_lower($caracter)) {
    echo "Es una letra minúscula";
} else if (ctype_punct($caracter)) {
    echo "Es un signo de puntuación";
} else if (ctype_space($caracter)) {
    echo "Es un carácter blanco";
} else {
    echo "Es un caracter especial";
}


?>