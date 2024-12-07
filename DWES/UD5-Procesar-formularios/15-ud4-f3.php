<?php

/**
 * @Author: Javier Puertas
 */

// 15. Formulario 3, petición por POST y mostrar en NombreAlumnoForm3OK.php los resultados
// indicando el campo en cursiva y el contenido en negrita

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario 3</title>
</head>
<body>
    <h1>Formulario 3 - Enviar Datos</h1>
    <form action="JavierPuertasForm3OK.php" method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" maxlength="50" required><br><br>

        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" maxlength="200" required><br><br>

        <label for="email">Correo electrónico:</label>
        <input type="text" name="email" maxlength="250" required><br><br>

        <label for="usuario">Nombre de usuario:</label>
        <input type="text" name="usuario" maxlength="5" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" maxlength="15" required><br><br>

        <label for="sexo">Sexo:</label>
        <input type="radio" name="sexo" value="hombre" required>
        <label for="hombre">Hombre</label>
        <input type="radio" name="sexo" value="mujer" required>
        <label for="mujer">Mujer</label><br><br>

        <label for="provincia">Provincia:</label>
        <select name="provincia" required>
            <option value="Alicante">Alicante</option>
            <option value="Castellón">Castellón</option>
            <option value="Valencia">Valencia</option>
        </select><br><br>

        <label for="horario">Horario de contacto:</label>
        <select size="3" name="horario[]" multiple required>
            <option value="8-14">De 8 a 14 horas</option>
            <option value="14-18">De 14 a 18 horas</option>
            <option value="18-22">De 18 a 22 horas</option>
        </select><br><br>

        <label for="conocido">¿Cómo nos ha conocido?</label><br>
        <input type="checkbox" name="conocido[]" value="amigo">
        <label for="amigo">Un amigo</label>
        <input type="checkbox" name="conocido[]" value="web">
        <label for="web">Web</label>
        <input type="checkbox" name="conocido[]" value="prensa">
        <label for="prensa">Prensa</label>
        <input type="checkbox" name="conocido[]" value="otros">
        <label for="otros">Otros</label><br><br>

        <label for="comentario">Comentario:</label>
        <textarea name="comentario" rows="6" cols="60"></textarea><br><br>

        <input type="checkbox" name="informacion" value="si" checked>
        <label for="informacion">Deseo recibir información sobre novedades y ofertas</label><br><br>

        <input type="checkbox" name="condiciones" required>
        <label for="condiciones">Declaro haber leído y aceptar las condiciones generales del programa y la normativa
            sobre protección de datos</label><br><br>

        <input type="reset" value="Limpiar">
        <input type="submit" value="Enviar">
    </form>
</body>
</html>
