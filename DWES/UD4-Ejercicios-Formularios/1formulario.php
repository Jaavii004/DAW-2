<?php

/**
 * @Author: Javier Puertas
 */

if (isset($_GET["nombre"])) {
    echo "<h1>Datos recibidos:</h1>";
    echo "<p>Nombre: " . $_GET["nombre"] . "</p>";
    echo "<p>Apellidos: " . $_GET["apellidos"] . "</p>";
    echo "<p>Sexo: " . $_GET["sexo"] . "</p>";
    echo "<p>Correo electrónico: " . $_GET["correo"] . "</p>";
    echo "<p>Provincia: " . $_GET["provincia"] . "</p>";
    echo "<p>Recibir información: " . (isset($_GET["informacion"]) ? "Sí" : "No") . "</p>";
    echo "<p>Aceptar condiciones: " . (isset($_GET["condiciones"]) ? "Sí" : "No") . "</p>";
} else {
    ?>

    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Javier Puertas - Formulario de registro</title>
    </head>

    <body>
        <h1>Javier Puertas - Formulario de registro</h1>
        <form method="GET" action="1formulario.php">
            <label>Nombre:</label>
            <input type="text" name="nombre" maxlength="50" required><br><br>

            <label>Apellidos:</label>
            <input type="text" name="apellidos" maxlength="200" required><br><br>

            <label>Sexo:</label>
            <input type="radio" name="sexo" value="hombre" required>
            <label>Hombre</label>
            <input type="radio" name="sexo" value="mujer" required>
            <label>Mujer</label><br><br>

            <label>Correo electrónico:</label>
            <input type="email" name="correo" maxlength="250" required><br><br>

            <label>Provincia:</label>
            <select name="provincia" required>
                <option value="Alicante">Alicante</option>
                <option value="Castellón">Castellón</option>
                <option value="Valencia">Valencia</option>
            </select><br><br>

            <input type="checkbox" name="informacion" checked>
            <label>Deseo recibir información sobre novedades y ofertas</label><br><br>

            <input type="checkbox" name="condiciones" required>
            <label>Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre protección de
                datos</label><br><br>

            <input type="submit" value="Enviar">
        </form>
    </body>

    </html>
    <?php
}
?>