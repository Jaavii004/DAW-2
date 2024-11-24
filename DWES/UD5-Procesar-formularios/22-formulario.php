<?php
/**
 * @Author: Javier Puertas
 */

// 22. Escribe un formulario que solicite una dirección de correo y que la confirme e indique si
// acepta recibir publicidad. Añade botón Enviar y Borrar. Cuando enviemos, iremos a otra página
// donde se le indique el email y si ha aceptado recibir publicidad o no. El botón borrar se
// mantendrá en el mismo formulario inicial pero limpiará todos los campos.
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Correo</title>
</head>
<body>
    <h1>Formulario de Correo</h1>
    <form method="post" action="22-formulario-resultado.php">
        <label for="correo">Correo electrónico:</label>
        <input type="email" name="correo" required><br><br>

        <label for="correo_confirmar">Confirmar correo electrónico:</label>
        <input type="email" name="correo_confirmar" required><br><br>

        <input type="checkbox" name="publicidad" id="publicidad">
        <label for="publicidad">Acepto recibir publicidad</label><br><br>

        <input type="submit" value="Enviar">
        <input type="reset" value="Borrar">
    </form>
</body>
</html>
