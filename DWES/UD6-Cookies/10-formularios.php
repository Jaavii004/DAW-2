<?php

/**
 * @Author: Javier Puertas
 */

// Usa el formulario (Ejercicio 22 UD5) que guarde en una Cookie la preferencia del usuario de si
// desea o no recibir publicidad y que muestre la opción anterior y la nueva elegida en caso de que
// la modifique.

// Recuperar los valores anteriores desde la cookie
$datos_anteriores = isset($_COOKIE['preferencias']) ? unserialize($_COOKIE['preferencias']) : [
    'email' => 'Ninguno',
    'publicidad' => 'Ninguna'
];
// Valores por defecto si no se ha enviado el formulario
$email_actual = $datos_anteriores['email'];
$publicidad_actual = $datos_anteriores['publicidad'];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['enviar'])) {
        // Guardar los datos actuales en una única cookie
        $datos_actuales = [
            'email' => $_POST['email'],
            'publicidad' => $_POST['publicidad']
        ];
        setcookie("preferencias", serialize($datos_actuales), time() + 3600);

        // Actualizar los valores actuales para mostrar
        $email_actual = $_POST['email'];
        $publicidad_actual = $_POST['publicidad'];
    } elseif (isset($_POST['borrar'])) {
        // Borrar la cookie
        setcookie("preferencias", "", time() - 3600);
        $email_actual = "";
        $publicidad_actual = "";
        $datos_anteriores = ['email' => 'Ninguno', 'publicidad' => 'Ninguna'];
    }
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
        <input type="email" name="email" id="email" value="<?php echo $email_actual; ?>" required><br><br>

        <label>¿Desea recibir publicidad?</label><br>
        <input type="radio" name="publicidad" value="sí" <?php echo ($publicidad_actual == 'sí') ? 'checked' : ''; ?>> Sí<br>
        <input type="radio" name="publicidad" value="no" <?php echo ($publicidad_actual == 'no') ? 'checked' : ''; ?>> No<br><br>

        <input type="submit" name="enviar" value="Enviar">
        <input type="submit" name="borrar" value="Borrar">
    </form>

    <h2>Preferencias Actuales</h2>
    <p><strong>Correo electrónico:</strong> <?php echo $email_actual; ?></p>
    <p><strong>Publicidad:</strong> <?php echo $publicidad_actual; ?></p>

    <h2>Preferencias Anteriores (Cookies)</h2>
    <p><strong>Correo electrónico anterior:</strong> <?php echo $datos_anteriores['email']; ?></p>
    <p><strong>Publicidad anterior:</strong> <?php echo $datos_anteriores['publicidad']; ?></p>
</body>
</html>
