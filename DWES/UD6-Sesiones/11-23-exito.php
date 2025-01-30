<?php
session_start(); // Iniciar sesión

// Verificar si existen los datos en la sesión
if (!isset($_SESSION['datos'])) {
    echo "No hay datos disponibles.";
    exit;
}

$datos = $_SESSION['datos'];

// Limpiar la sesión para evitar que los datos se mantengan en futuros accesos
unset($_SESSION['datos']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del formulario</title>
</head>
<body>
    <h1>Resultados del formulario</h1>

    <p><strong>Nombre:</strong> <?php echo $datos['nombre'] ?></p>
    <p><strong>Correo electrónico:</strong> <?php echo $datos['email'] ?></p>
    <p><strong>Nivel de estudios:</strong> <?php echo $datos['nivel_estudios'] ?></p>
    <p><strong>Situación actual:</strong> <?php echo implode(', ', $datos['situacion']) ?></p>
    <p><strong>Hobbies:</strong> <?php echo implode(', ', $datos['hobbies']) ?></p>

    <?php if (!empty($datos['otro_hobby'])): ?>
        <p><strong>Otro hobby:</strong> <?php echo $datos['otro_hobby'] ?></p>
    <?php endif; ?>

    <a href="11-23-form.php">Volver al formulario</a>
</body>
</html>
