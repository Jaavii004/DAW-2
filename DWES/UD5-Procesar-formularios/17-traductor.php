<?php
/**
 * @Author: Javier Puertas
 */

// 17. Escribe un programa que dadas 10 palabras en inglés muestre su traducción al castellano a su
// derecha en una tabla. El usuario debe seleccionar la/s palabra/s a traducir (podría seleccionarlas todas).

$traducciones = [
    "hello" => "hola",
    "goodbye" => "adiós",
    "please" => "por favor",
    "thank you" => "gracias",
    "yes" => "sí",
    "no" => "no",
    "friend" => "amigo",
    "love" => "amor",
    "family" => "familia",
    "school" => "escuela"
];
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Traducción de Palabras</title>
</head>

<body>
    <h1>Selecciona palabras para traducir</h1>
    <form method="post">
        <table>
            <tr>
                <th>Palabra en inglés</th>
                <th>Seleccionar</th>
            </tr>
            <?php foreach ($traducciones as $palabra => $traduccion): ?>
            <tr>
                <td><?= $palabra ?></td>
                <td><input type="checkbox" name="<?= $palabra ?>"></td>
            </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <input type="submit" value="Traducir">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        echo "<h2>Traducciones:</h2>";
        echo "<table>";
        echo "<tr>";
        echo "<th>Palabra en inglés</th>";
        echo "<th>Traducción en castellano</th>";
        echo "</tr>";

        // Mostrar traducciones basadas en el array asociativo
        foreach ($traducciones as $palabra => $traduccion) {
            if (isset($_POST[$palabra])) {
                echo "<tr>";
                echo "<td>$palabra</td>";
                echo "<td>$traduccion</td>";
                echo "</tr>";
            }
        }

        echo "</table>";
    }
    ?>
</body>

</html>
