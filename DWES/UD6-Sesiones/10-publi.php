<?php

/**
 * @Author: Javier Puertas
 */

function validarEmail($email) {
    if (empty($email)) {
        return 'El email no puede estar vacío.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return 'El email no es válido.';
    }
    return null;
}

// Iniciar la sesión
session_start();

$nombre_anterior = $_SESSION['nombre'] ?? 'Ninguno';
$email_anterior = $_SESSION['email'] ?? 'Ninguno';
$publicidad_anterior = $_SESSION['publicidad'] ?? 'No';

// Procesar el formulario si se envió
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email_error = validarEmail($_POST['email']);
    if ($email_error) {
        echo "<p style='color: red;'>$email_error</p>";
    } else {
        $_SESSION['nombre'] = $_POST['nombre'] ?? 'Ninguno';
        $_SESSION['email'] = $_POST['email'] ?? 'Ninguno';
        $_SESSION['publicidad'] = isset($_POST['publicidad']) ? 'Sí' : 'No';
        
        // Recuperar los valores de la sesión actual
        $nombre_actual = $_SESSION['nombre'] ?? 'Ninguno';
        $email_actual = $_SESSION['email'] ?? 'Ninguno';
        $publicidad_actual = $_SESSION['publicidad'] ?? 'No';
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Confirmación</title>
</head>
<body>
    <h1>Formulario de Registro</h1>
    <form method="POST">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="email">Correo electrónico:</label>
        <input type="text" id="email" name="email" required><br><br>
        
        <label for="publicidad">¿Desea recibir publicidad?</label>
        <input type="checkbox" id="publicidad" name="publicidad"><br><br>
        
        <button type="submit">Enviar</button>
    </form>
    
    <h1>Confirmación de Datos</h1>
    
    <h2>Usuario Actual</h2>
    <p>Nombre: <?php echo $nombre_actual; ?></p>
    <p>Correo electrónico: <?php echo $email_actual; ?></p>
    <p>¿Desea recibir publicidad? <?php echo $publicidad_actual; ?></p>
    
    <h2>Usuario Anterior</h2>
    <p>Nombre: <?php echo $nombre_anterior; ?></p>
    <p>Correo electrónico: <?php echo $email_anterior; ?></p>
    <p>¿Deseaba recibir publicidad? <?php echo $publicidad_anterior; ?></p>
</body>
</html>