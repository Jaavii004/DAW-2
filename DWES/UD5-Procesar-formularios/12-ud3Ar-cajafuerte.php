<?php
/**
 * @Author: Javier Puertas
 */

// 12. Ejercicio 5. Realiza el control de acceso a una caja fuerte. La combinación será un número de
// 4 cifras. El programa nos pedirá la combinación para abrirla. Si no acertamos, se nos mostrará el
// mensaje “Lo siento, esa no es la combinación” en color rojo y si acertamos se nos dirá “La caja
// fuerte se ha abierto satisfactoriamente” en color verde. Tendremos cuatro oportunidades para
// abrir la caja fuerte.

$combinacion = "6666";
$intentos = isset($_POST['intentos']) ? (int)$_POST['intentos'] : 0;
$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $combinacionIngresada = $_POST['combinacion'];
    if ($combinacionIngresada === $combinacion) {
        $mensaje = "La caja fuerte se ha abierto satisfactoriamente.";
    } else {
        $intentos++;
        if ($intentos === 4) {
            $mensaje = "Caja bloqueada.";
        } else {
            $mensaje = "Lo siento, esa no es la combinación.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Caja Fuerte</title>
</head>

<body>
    <h1>Caja Fuerte</h1>
    <form method="post" action="">
        <label for="combinacion">Ingrese la combinación de 4 cifras:</label>
        <input type="text" name="combinacion" required>
        <input type="hidden" name="intentos" value="<?php echo $intentos ?>">
        <br><br>
        <input type="submit" value="Abrir Caja Fuerte">
    </form>

    <?php
        echo "<p>$mensaje</p>";
        echo "<p>Intentos restantes: " . (4 - $intentos) . "</p>";
    ?>
</body>

</html>
