<?php
/**
 * @Author: Javier Puertas
 */

// 20. Realiza un programa que pida una hora por teclado y que muestre luego el saludo, esto es:
// buenos días, buenas tardes o buenas noches según la hora. Se utilizarán los tramos de 6 a 12, de
// 13 a 20 y de 21 a 5 respectivamente. Sólo se tienen en cuenta las horas, los minutos no se deben
// introducir por teclado.
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo según la hora</title>
</head>

<body>
    <h1>Introduce una hora para recibir un saludo</h1>
    <form method="post">
        <label for="hora">Hora sin minutos:</label><br>
        <input type="text" name="hora" required><br><br>
        <input type="submit" value="Enviar">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $hora = $_POST['hora'];

        // Verificar si es un valor numérico y está en el rango de 0 a 23
        if (is_numeric($hora) && $hora >= 0 && $hora <= 23) {
            if ($hora >= 6 && $hora <= 12) {
                echo "<p>Buenos días</p>";
            } elseif ($hora >= 13 && $hora <= 20) {
                echo "<p>Buenas tardes</p>";
            } else {
                echo "<p>Buenas noches</p>";
            }
        } else {
            echo "<p>Por favor, introduce una hora válida entre 0 y 23.</p>";
        }
    }
    ?>
</body>

</html>
