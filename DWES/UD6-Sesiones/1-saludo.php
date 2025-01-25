<?php

/**
 * @Author: Javier Puertas
 */

// Usa el formulario del ejercicio 1 de Cookies de saludo o despedida de modo que uses la sesión
// para mostrar el usuario y saludo actuales y además muestre el usuario y saludo anterior.

session_start();

// Si el formulario es enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Guardar el saludo anterior en la sesión (si existe)
    $_SESSION['usuarioAnterior'] = isset($_SESSION['usuario']) ? $_SESSION['usuario'] : '';
    $_SESSION['saludoAnterior'] = isset($_SESSION['saludo']) ? $_SESSION['saludo'] : '';
    
    // Obtener el nombre del usuario y el saludo del formulario
    $usuario = $_POST['usuario'];
    $saludo = $_POST['saludo'];

    // Guardar el usuario y saludo actuales en la sesión
    $_SESSION['usuario'] = $usuario;
    $_SESSION['saludo'] = $saludo;

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saludo y Despedida con Sesión</title>
</head>
<body>
    <h1>Formulario de Saludo</h1>
    
    <!-- Formulario para ingresar el nombre del usuario y el saludo -->
    <form method="POST">
        <label for="usuario">Nombre de usuario:</label>
        <input type="text" name="usuario" id="usuario" required>
        <br>
        <label for="saludo">Saludo (por ejemplo, "Hola", "Buenos días"):</label>
        <input type="text" name="saludo" id="saludo" required>
        <br>
        <input type="submit" value="Guardar saludo">
    </form>

    <hr>

    <h2>Saludo Actual</h2>
    <?php
    // Verificar si existen las variables de sesión y mostrar el saludo actual
    if (isset($_SESSION['usuario']) && isset($_SESSION['saludo'])) {
        echo "Hola, " . $_SESSION['usuario'] . ". Tu saludo es: " . $_SESSION['saludo'] . ".<br>";
    } else {
        echo "No se ha guardado un saludo aún.<br>";
    }

    // Mostrar el saludo anterior si existe
    if (isset($_SESSION['usuarioAnterior']) && $_SESSION['usuarioAnterior'] !== '') {
        echo "El saludo anterior fue para " . $_SESSION['usuarioAnterior'] . " y fue: " . $_SESSION['saludoAnterior'] . ".";
    } else {
        echo "No hay un saludo anterior.";
    }
    ?>

</body>
</html>
