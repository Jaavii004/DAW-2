<?php

/**
 * @Author: Javier Puertas
 */


// Mostrar datos recibidos
if (isset($_GET["nombre"])) {
    echo "<h1>Datos recibidos:</h1>";
    echo "<p><strong>Nombre:</strong> " . $_GET["nombre"] . "</p>";
    echo "<p><strong>Apellidos:</strong> " . $_GET["apellidos"] . "</p>";
    echo "<p><strong>Correo electrónico:</strong> " . $_GET["email"] . "</p>";
    echo "<p><strong>Usuario:</strong> " . $_GET["usuario"] . "</p>";
    echo "<p><strong>Sexo:</strong> " . $_GET["sexo"] . "</p>";
    echo "<p><strong>Provincia:</strong> " . $_GET["provincia"] . "</p>";

    echo "<p><strong>Horario de contacto:</strong> " . implode(" - ", $_GET["horario"]) . "</p>";

    if (isset($_GET["conocido"])) {
        echo "<p><strong>¿Cómo nos ha conocido?:</strong> " . implode(", ", $_GET["conocido"]) . "</p>";
    } else {
        echo "<p><strong>¿Cómo nos ha conocido?:</strong> No especificado</p>";
    }

    echo "<p><strong>Comentario:</strong> " . $_GET["comentario"] . "</p>";
    echo "<p><strong>Recibir información:</strong> " . (isset($_GET["informacion"]) ? "Ha seleccionado recibir ofertas" : "No ha seleccionado recibir ofertas") . "</p>";
    echo "<p><strong>Aceptar condiciones:</strong> " . (isset($_GET["condiciones"]) ? "Sí" : "No") . "</p>";
} else {
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javier Puertas - Formulario de registro 3</title>
</head>

<body>
    <h1>Javier Puertas - Formulario de registro 3</h1>
    <form action="3formulario.php" method="GET">
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
<?php
}
?>