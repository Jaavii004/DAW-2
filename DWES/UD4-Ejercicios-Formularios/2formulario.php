<?php
/**
 * @Author: Javier Puertas
 */

 if (isset($_GET["nombre"])) {
    echo "<h1>Datos recibidos:</h1>";
    echo "<p><strong>Nombre:</strong> " . $_GET["nombre"] . "</p>";
    echo "<p><strong>Apellidos:</strong> " . $_GET["apellidos"] . "</p>";
    echo "<p><strong>Sexo:</strong> " . $_GET["sexo"] . "</p>";
    echo "<p><strong>Correo electrónico:</strong> " . $_GET["correo"] . "</p>";
    echo "<p><strong>Provincia:</strong> " . $_GET["provincia"] . "</p>";
    echo "<p><strong>Recibir información:</strong> " . (isset($_GET["informacion"]) ? "Sí" : "No") . "</p>";
    echo "<p><strong>Aceptar condiciones:</strong> " . (isset($_GET["condiciones"]) ? "Sí" : "No") . "</p>";
} else {
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Javier Puertas - Formulario de registro 2</title>
</head>
<body>
    <h1>Javier Puertas - Formulario de registro 2</h1>
    <form method="GET" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" maxlength="50" required><br><br>
        
        <label for="apellidos">Apellidos:</label>
        <input type="text" name="apellidos" maxlength="200" required><br><br>
        
        <label for="correo">Correo electrónico:</label>
        <input type="text" name="correo" maxlength="250" required><br><br>
        
        <label for="usuario">Usuario:</label>
        <input type="text" name="usuario" maxlength="5" required><br><br>
        
        <label for="password">Contraseña:</label>
        <input type="password" name="password" maxlength="15" required><br><br>
        
        <label for="sexo">Sexo:</label>
        <input type="radio" name="sexo" value="hombre" required>
        <label for="hombre">Hombre</label>
        <input type="radio" name="sexo" value="mujer" required>
        <label for="mujer">Mujer</label><br><br>
        
        <label for="provincia">Provincia:</label>
        <select name="provincia" required></select>
            <option value="Alicante">Alicante</option>
            <option value="Castellón">Castellón</option>
            <option value="Valencia">Valencia</option>
        </select><br><br>
        
        <label for="situacion">Situación:</label>
        <select size="2" name="situacion[]" multiple required></select>
            <option value="Estudiando">Estudiando</option>
            <option value="Trabajando">Trabajando</option>
            <option value="Buscando empleo">Buscando empleo</option>
            <option value="Otro">Otro</option>
        </select><br><br>
        
        <label for="comentario">Comentario:</label>
        <textarea name="comentario" rows="6" cols="60"></textarea><br><br>
        
        <input type="checkbox" name="informacion" checked>
        <label for="informacion">Deseo recibir información sobre novedades y ofertas</label><br><br>
        
        <input type="checkbox" name="condiciones" required>
        <label for="condiciones">Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre protección de datos</label><br><br>
        
        <input type="submit" value="Enviar">
        <input type="reset" value="Limpiar">
    </form>
</body>
</html>

<?php
}
?>
