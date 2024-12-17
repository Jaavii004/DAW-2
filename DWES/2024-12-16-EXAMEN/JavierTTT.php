<?php

/**
 * @Author: Javier Puertas
 */

$nombreJ1 = "";
$nombreJ2 = "";
$CaracterJ1 = "X";
$CaracterJ2 = "O";
$tablero;

$Jugador1  = array(
    "victorias" => 0,
    "derrotas" => 0,
    "copas" => 0
);
$Jugador2  = array(
    "victorias" => 0,
    "derrotas" => 0,
    "copas" => 0
);


function inicializarTablero() {
    $tablero = [];

    for ($n = 0; $n < 3; $n++) {
        for ($m = 0; $m < 3; $m++) {
            $tablero[$n][$m] = " ";
        }
    }
    return $tablero;
}

function imprimirTablero($tablero) {
    for ($n = 0; $n < 3; $n++) {
        for ($m = 0; $m < 3; $m++) {
            echo " ". (($tablero[$n][$m] == " ") ? " " : $tablero[$n][$m] ) . " ";
            if ($m < 2) {
                echo "|";
            }
        }
        if ($n < 2) {
            echo "\n---|---|---\n";
        } else {
            echo "\n";
        }
    }
}

// false nos dice que hay sitios libres true que esta lleno
function tableroLleno($tablero) {
    for ($n = 0; $n < 3; $n++) {
        for ($m = 0; $m < 3; $m++) {
            if ($tablero[$n][$m] != " ") {
                return false;
            }
        }
    }
    return true;
}

// true(1) gana false( ) demomento no
function verificarGanador($tablero, $caracter) {
    // lineas horizontal
    for ($i=0; $i < 3; $i++) { 
        $puntos = 0;
        for ($j=0; $j < 3; $j++) { 
            if ($tablero[$i][$j] === $caracter) {
                $puntos++;
            }
        }
        if ($puntos === 3) {
            return true;
        }
    }

    // Vertical
    for ($i=0; $i < 3; $i++) { 
        $puntos = 0;
        for ($j=0; $j < 3; $j++) { 
            if ($tablero[$j][$i] === $caracter) {
                $puntos++;
            }
        }
        if ($puntos === 3) {
            return true;
        }
    }

    // Diagonales
    if ($tablero[0][0] === $caracter && $caracter === $tablero[1][1] && $caracter === $tablero[2][2]) {
        return true;
    }

    if ($tablero[0][2] === $caracter && $caracter === $tablero[1][1] && $caracter === $tablero[0][2]) {
        return true;
    }

    return false;
}

function iniciarPartida($nombreJ1, $nombreJ2, $CaracterJ1, $CaracterJ2) {
    $tablero = inicializarTablero();
    $sinGanador = true;
    $haGanadoJ = "";
    $fila = "";
    $columna = "";
    while ($sinGanador) {
        $fila =  ReadLine($nombreJ1 . " " . "(" . $CaracterJ1 . "), indica la fila(0-2) o escribe 's' para abandonarla partida: ");
        $filacomp = $fila;
        while ($filacomp =! "s" || $filacomp < 0 || $filacomp > 2) {
            $fila =  ReadLine($nombreJ1 . " " . "(" . $CaracterJ1 . "), indica la fila(0-2) o escribe 's' para abandonarla partida: ");
            $filacomp = $fila;
        }
        if ($filacomp == "s") {
            $sinGanador = false;
            $haGanadoJ = 2;
        } else {
            $columna =  ReadLine($nombreJ1 . " " . "(" . $CaracterJ1 . "), indica la columna(0-2) o escribe 's' para abandonarla partida: ");
            $columnacomp = $columna;
            while ($columnacomp =! "s" || $columnacomp < 0 || $columnacomp > 2) {
                $columna =  ReadLine($nombreJ1 . " " . "(" . $CaracterJ1 . "), indica la columna(0-2) o escribe 's' para abandonarla partida: ");
                $columnacomp = $columna;
            }
            if ($columnacomp == "s") {
                $sinGanador = false;
                $haGanadoJ = 2;
            } else {
                $tablero[$fila][$columna] =  $CaracterJ1;
                if (verificarGanador($tablero, $CaracterJ1)) {
                    $haGanadoJ = 1;
                    $sinGanador = false;
                }
            }
        }
        imprimirTablero($tablero);
        if ($sinGanador) {
            if (tableroLleno($tablero)) {
                $sinGanador = false;
                $haGanadoJ = "empate";
            } else {
                $fila = ReadLine($nombreJ2 . " " . "(" . $CaracterJ2 . "), indica la fila(0-2) o escribe 's' para abandonarla partida: ");
                $filacomp = $fila;
                while ($filacomp =! "s" || $filacomp < 0 || $filacomp > 2) {
                    $fila = ReadLine($nombreJ2 . " " . "(" . $CaracterJ2 . "), indica la fila(0-2) o escribe 's' para abandonarla partida: ");
                    $filacomp = $fila;
                }
                if ($filacomp == "s") {
                    $sinGanador = false;
                    $haGanadoJ = 1;
                } else {
                    $columna = ReadLine($nombreJ2 . " " . "(" . $CaracterJ2 . "), indica la columna(0-2) o escribe 's' para abandonarla partida: ");
                    $columnacomp = $columna;
                    while ($columnacomp =! "s" || $columnacomp < 0 || $columnacomp > 2) {
                        $columna = ReadLine($nombreJ2 . " " . "(" . $CaracterJ2 . "), indica la columna(0-2) o escribe 's' para abandonarla partida: ");
                        $columnacomp = $columna;
                    }
                    if ($columnacomp == "s") {
                        $sinGanador = false;
                        $haGanadoJ = 1;
                    } else {
                        $tablero[$fila][$columna] =  $CaracterJ2;
                        imprimirTablero($tablero);
                        if (verificarGanador($tablero, $CaracterJ2)) {
                            $haGanadoJ = 2;
                            $sinGanador = false;
                        }
                    }
                }
            }
        }
    }

    if ($haGanadoJ == 1) {
        echo "\n !$nombreJ1 ha ganado esta partida!\n";
    }else {
        if ($haGanadoJ == 2) {
            echo "\n !$nombreJ2 ha ganado esta partida!\n";
        }else {
            echo "\n ESTO ES UN EMPATE \n";
        }
    }

    return $haGanadoJ;

}

//echo tableroLleno($tablero);
//echo verificarGanador($tablero, " ");
//imprimirTablero($tablero);


$nombreJ1 = readline("Dime el nombre Jugador 1: ");
$CaracterJ1 = readline("Elige tu caracter Jugador 1: ");

$nombreJ2 = readline("Dime el nombre Jugador 2: ");
$CaracterJ2 = readline("Elige tu caracter Jugador 2: ");

$nosalimos = true;
$partida = 0;
echo "--- Iniciando un nuevo torneo de 3 partidas ---\n";
while ($nosalimos) {
    $partida++;
    echo "--- Partida $partida ---\n";
    $ganaJ = iniciarPartida($nombreJ1,$nombreJ2, $CaracterJ1, $CaracterJ2);
    

    if ($ganaJ == 1) {
        $Jugador1["victorias"] += 1;
        $Jugador2["derrotas"] += 1;
    } else {
        if ($ganaJ == 2) {
            $Jugador2["victorias"] += 1;
            $Jugador1["derrotas"] += 1;
        }
    }

    if ($partida % 3 == 0) {
        echo "--- Estadísticas del Torneo ---\n";
        echo "$nombreJ1 ($CaracterJ1) - Victorias $Jugador1[victorias], Derrotas: $Jugador1[derrotas], Copas: $Jugador1[copas]\n";
        echo "$nombreJ2 ($CaracterJ2) - Victorias $Jugador2[victorias], Derrotas: $Jugador2[derrotas], Copas: $Jugador2[copas]\n";

        if ($Jugador1["victorias"] > $Jugador2["victorias"]) {
            echo "¡$nombreJ1 ha ganado el torneo!";
        } else {
            echo "¡$nombreJ2 ha ganado el torneo!";
        }
        echo "\n";
        $seguir = ReadLine("¿Desean jugar otro torneo?");
    
        if ($seguir === "s") {
            echo "--- Iniciando un nuevo torneo de 3 partidas ---\n";
            $partida = 0;
        } else {
            $nosalimos = true;
        }
    }

}




?>