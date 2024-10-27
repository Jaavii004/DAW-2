<?php
/**
 * @Author: Javier Puertas
 */

// 12. Ejercicio 5. Realiza el control de acceso a una caja fuerte. La combinación será un número de
// 4 cifras. El programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el
// mensaje “Lo siento, esa no es la combinación” en color rojo y si acertamos se nos dirá “La caja
// fuerte se ha abierto satisfactoriamente” en color verde. Tendremos cuatro oportunidades para
// abrir la caja fuerte.

$combinacion = "1234"; // Combinación de la caja fuerte
$intentos = isset($_POST['intentos']) ? $_POST['intentos'] : 0;
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $combinacionIngresada = $_POST['combinacion'];

    if (is_numeric($combinacionIngresada) && strlen($combinacionIngresada) == 4) {
        if ($combinacionIngresada === $combinacion) {
            $mensaje = "La caja fuerte se ha abierto satisfactoriamente.";
            $intentos = 0; // Reiniciar intentos después de acertar
        } else {
            $intentos++;
            if ($intentos >= 4) {
                $mensaje = "Lo siento, ha agotado las oportunidades. Caja bloqueada.";
                $intentos = 0; // Reiniciar intentos después de 4 fallos
            } else {
                $mensaje = "Lo siento, esa no es la combinación.";
            }
        }
    } else {
        $mensaje = "La combinación debe ser un número de 4 cifras.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de Acceso a la Caja Fuerte</title>
</head>

<body>
    <h1>Control de Acceso a la Caja Fuerte</h1>
    <form method="post" action="">
        <label for="combinacion">Ingrese la combinación de 4 cifras:</label>
        <input type="text" name="combinacion" maxlength="4" required>
        <input type="hidden" name="intentos" value="<? echo $intentos ?>">
        <br><br>
        <input type="submit" value="Abrir Caja Fuerte">
    </form>

    <?php
    if ($mensaje) {
        echo "<p>$mensaje</p>";
        if ($intentos > 0 && $intentos < 4) {
            echo "<p>Intentos restantes: " . (4 - $intentos) . "</p>";
        }
    }
    ?>
</body>

</html>
