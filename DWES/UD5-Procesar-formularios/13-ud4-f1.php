<?php

/**
 * @Author: Javier Puertas
 */

// 13. Formulario 1, petición por GET y mostrar en NombreAlumnoForm1OK.php los resultados
// indicando el campo en cursiva y el contenido en negrita

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 1 - Registro</title>
</head>
<body>
    <h1>Formulario 1 - Registro</h1>
    <form method="GET" action="JavierPuertasForm1OK.php">
        <label>Nombre:</label>
        <input type="text" name="nombre" maxlength="50" required><br><br>

        <label>Apellidos:</label>
        <input type="text" name="apellidos" maxlength="200" required><br><br>

        <label>Sexo:</label>
        <input type="radio" name="sexo" value="Hombre" required>
        <label>Hombre</label>
        <input type="radio" name="sexo" value="Mujer" required>
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
        <label>Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre protección de datos</label><br><br>

        <input type="submit" value="Enviar">
    </form>
</body>
</html>