<?php

/**
 * @Author: Javier Puertas
 */

$tablero;

$Jugador1  = array(
    'Nombre' => "",
    'caracter' => "",
    "victorias" => 0,
    "derrotas" => 0,
    "copas" => 0
);

$Jugador2  = array(
    'Nombre' => "",
    'caracter' => "",
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
            if ($tablero[$n][$m] == " ") {
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

function jugarFilas($nombre, $caracter, $queEs) {
    $fila = -1;
    do {
        $fila = ReadLine($nombre . " " . "(" . $caracter . "), indica la ". $queEs . " (0-2) o escribe 's' para abandonarla partida: ");
    } while ($fila !== "s" && ($fila < 0 || $fila > 2));
    return $fila;
}

function EstaVacia($tablero, $fila, $columna) {
    if ($tablero[$fila][$columna] === " ") {
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
        imprimirTablero($tablero);
        if (tableroLleno($tablero)) {
            $sinGanador = false;
            $haGanadoJ = "empate";
        } else {
            $sepuedePonerahi = true;
            do {
                $fila = jugarFilas($nombreJ1, $CaracterJ1, "Fila");
                if ($fila == "s") {
                    $sinGanador = false;
                    $haGanadoJ = 2;
                    $sepuedePonerahi = false;
                } else {
                    $columna = jugarFilas($nombreJ1, $CaracterJ1, "Columna");
                    if ($columna == "s") {
                        $sinGanador = false;
                        $haGanadoJ = 2;
                    } else {
                        if (EstaVacia($tablero, $fila,$columna)) {
                            $tablero[$fila][$columna] =  $CaracterJ1;
                            $sepuedePonerahi = false;
                        } else {
                            echo " - La casilla eleguida esta llena, eligue otra\n";
                        }
                        if (verificarGanador($tablero, $CaracterJ1)) {
                            $haGanadoJ = 1;
                            $sinGanador = false;
                        }
                    }
                }
            } while($sepuedePonerahi);
        }
        imprimirTablero($tablero);
        if ($sinGanador) {
            if (tableroLleno($tablero)) {
                $sinGanador = false;
                $haGanadoJ = "empate";
            } else {
                $sepuedePonerahi = true;
                do {
                    $fila = jugarFilas($nombreJ2, $CaracterJ2, "Fila");
                    if ($fila == "s") {
                        $sinGanador = false;
                        $haGanadoJ = 1;
                        $sepuedePonerahi = false;
                    } else {
                        $columna = jugarFilas($nombreJ2, $CaracterJ2, "Columna");
                        if ($columna == "s") {
                            $sinGanador = false;
                            $haGanadoJ = 1;
                        } else {
                            if (EstaVacia($tablero, $fila,$columna)) {
                                $tablero[$fila][$columna] =  $CaracterJ2;
                                $sepuedePonerahi = false;
                            } else {
                                echo " - La casilla eleguida esta llena, eligue otra\n";
                            }
                            if (verificarGanador($tablero, $CaracterJ2)) {
                                $haGanadoJ = 2;
                                $sinGanador = false;
                            }
                        }
                    }
                } while($sepuedePonerahi);
            }
        }
    }

    if ($haGanadoJ == 1) {
        echo "\n !$nombreJ1 ha ganado esta partida!\n";
    } else {
        if ($haGanadoJ == 2) {
            echo "\n !$nombreJ2 ha ganado esta partida!\n";
        }else {
            echo "\n ESTO ES UN EMPATE \n";
        }
    }

    return $haGanadoJ;

}

$Jugador1['Nombre'] = readline("Dime el nombre Jugador 1: ");
$Jugador1['caracter'] = readline("Elige tu caracter Jugador 1: ");

$Jugador2['Nombre'] = readline("Dime el nombre Jugador 2: ");
$Jugador2['caracter'] = readline("Elige tu caracter Jugador 2: ");

$seguir = "s";
$partida = 0;
echo "--- Iniciando un nuevo torneo de 3 partidas ---\n";
while ($seguir === "s") {
    $partida++;
    echo "--- Partida $partida ---\n";
    $ganaJ = iniciarPartida($Jugador1['Nombre'],$Jugador2['Nombre'], $Jugador1['caracter'], $Jugador2['caracter']);
    

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
        if ($Jugador1["victorias"] > $Jugador2["victorias"]) {
            echo "¡$".$Jugador1['Nombre']." ha ganado el torneo!";
            $Jugador1['copas'] += 1;
        } else {
            echo "¡".$Jugador2['Nombre'] ." ha ganado el torneo!";
            $Jugador2['copas'] += 1;
        }
        echo "\n--- Estadísticas del Torneo ---\n";
        echo $Jugador1['Nombre']." (". $Jugador1['caracter']. ") - Victorias $Jugador1[victorias], Derrotas: $Jugador1[derrotas], Copas: $Jugador1[copas]\n";
        echo $Jugador2['Nombre'] ." (". $Jugador2['caracter']. ") - Victorias $Jugador2[victorias], Derrotas: $Jugador2[derrotas], Copas: $Jugador2[copas]\n";

        echo "\n";
        $seguir = ReadLine("¿Desean jugar otro torneo? ");
    
        if ($seguir === "s") {
            echo "--- Iniciando un nuevo torneo de 3 partidas ---\n";
            $partida = 0;
            $Jugador1['victorias'] = 0;
            $Jugador1['derrotas'] = 0;
            $Jugador2['victorias'] = 0;
            $Jugador2['derrotas'] = 0;
        } else {
            echo "--- Gracias por jugar ---\n";
        }
    }

}

?>