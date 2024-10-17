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
    echo "<p>Recibir información: " . $_GET["informacion"] . "</p>";
    echo "<p>Aceptar condiciones: " . $_GET["condiciones"] . "</p>";
} else  {
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos - Formulario de registro</title>
</head>
<body>
    <h1>Alumnos - Formulario de registro</h1>
    <form method="GET" action="1formulario.php">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" maxlength="50" required><br><br>
        
        <label for="apellidos">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" maxlength="200" required><br><br>
        
        <label for="sexo">Sexo:</label>
        <input type="radio" id="sexo" name="sexo" value="hombre" required>
        <label for="sexo">Hombre</label>
        <input type="radio" id="sexo" name="sexo" value="mujer" required>
        <label for="sexo">Mujer</label><br><br>
        
        <label for="correo">Correo electrónico:</label>
        <input type="email" id="correo" name="correo" maxlength="250" required><br><br>
        
        <label for="provincia">Provincia:</label>
        <select id="provincia" name="provincia" required>
            <option value="Alicante">Alicante</option>
            <option value="Castellón">Castellón</option>
            <option value="Valencia">Valencia</option>
        </select><br><br>
        
        <input type="checkbox" id="informacion" name="informacion" checked>
        <label for="informacion">Deseo recibir información sobre novedades y ofertas</label><br><br>
        
        <input type="checkbox" id="condiciones" name="condiciones" required>
        <label for="condiciones">Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre protección de datos</label><br><br>
        
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
<?php
}
?>