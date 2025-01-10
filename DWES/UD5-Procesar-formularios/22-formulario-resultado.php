<?php
/**
 * @Author: Javier Puertas
 */

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $correo = $_POST['correo'];
    $correo_confirmar = $_POST['correo_confirmar'];
    $publicidad = isset($_POST['publicidad']) ? 'Sí' : 'No';

    // Validar que los correos coincidan
    if (filter_var($correo, FILTER_VALIDATE_EMAIL) && $correo === $correo_confirmar) {
        echo "<h1>Datos recibidos</h1>";
        echo "<p>Correo: <strong>$correo</strong></p>";
        echo "<p>Acepta recibir publicidad: <strong>$publicidad</strong></p>";
    } else {
        echo "<h1>Error</h1>";
        echo "<p>Los correos no coinciden. Por favor, vuelve a intentarlo.</p>";
        echo '<a href="formulario.php">Volver al formulario</a>';
    }
} else {
    echo "<h1>Error</h1>";
    echo "<p>No se han enviado datos. Por favor, vuelve al formulario.</p>";
    echo '<a href="formulario.php">Volver al formulario</a>';
}
?>
