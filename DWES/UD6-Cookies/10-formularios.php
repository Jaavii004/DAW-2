<?php

/**
 * @Author: Javier Puertas
 */

// Usa el formulario (Ejercicio 22 UD5) que guarde en una Cookie la preferencia del usuario de si
// desea o no recibir publicidad y que muestre la opción anterior y la nueva elegida en caso de que
// la modifique.

// Variables para cookies y preferencias
$publicidad_anterior = isset($_COOKIE['publicidad']) ? $_COOKIE['publicidad'] : 'Ninguna';
$email_anterior = isset($_COOKIE['email']) ? $_COOKIE['email'] : 'Ninguno';

// Procesar formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['enviar'])) {
        // Guardar las preferencias en cookies
        setcookie("publicidad", $_POST['publicidad'], time() + 3600);
        setcookie("email", $_POST['email'], time() + 3600);

        // Actualizar variables actuales
        $publicidad_actual = $_POST['publicidad'];
        $email_actual = $_POST['email'];
    } elseif (isset($_POST['borrar'])) {
        // Borrar las cookies
        setcookie("publicidad", "", time() - 3600);
        setcookie("email", "", time() - 3600);
        $publicidad_actual = "";
        $email_actual = "";
    }
} else {
    // Inicializar valores desde cookies
    $publicidad_actual = isset($_COOKIE['publicidad']) ? $_COOKIE['publicidad'] : 'Ninguna';
    $email_actual = isset($_COOKIE['email']) ? $_COOKIE['email'] : '';
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 22 - Publicidad y Preferencias</title>
</head>
<body>
    <h1>Formulario de Preferencias</h1>
    
    <form method="POST" action="">
        <label for="email">Correo electrónico:</label><br>
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email_actual); ?>" required><br><br>

        <label>¿Desea recibir publicidad?</label><br>
        <input type="radio" name="publicidad" value="sí" <?php echo ($publicidad_actual == 'sí') ? 'checked' : ''; ?>> Sí<br>
        <input type="radio" name="publicidad" value="no" <?php echo ($publicidad_actual == 'no') ? 'checked' : ''; ?>> No<br><br>

        <input type="submit" name="enviar" value="Enviar">
        <input type="submit" name="borrar" value="Borrar">
    </form>

    <h2>Preferencias Actuales</h2>
    <p><strong>Correo electrónico:</strong> <?php echo htmlspecialchars($email_actual); ?></p>
    <p><strong>Publicidad:</strong> <?php echo $publicidad_actual; ?></p>

    <h2>Preferencias Anteriores (Cookies)</h2>
    <p><strong>Correo electrónico anterior:</strong> <?php echo htmlspecialchars($email_anterior); ?></p>
    <p><strong>Publicidad anterior:</strong> <?php echo $publicidad_anterior; ?></p>
</body>
</html>
