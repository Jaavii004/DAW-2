<?php
/**
 * @Author: Javier Puertas
 */

// 23. Escribe un formulario de recogida de datos que conste de dos páginas: En la primera página
// se solicitan los datos y se muestran errores tras validarlos. En la segunda página se muestra toda
// la información introducida por el usuario si no hay errores errores. Los datos a recoger son datos
// personales, nivel de estudios (desplegable), situación actual (selección múltiple: estudiando,
// trabajando, buscando empleo, desempleado) y hobbies (marcar de varios mostrados y poner otro
// con opción a introducir texto)

// Validar que se hayan recibido los datos necesarios
if (empty($_GET['nombre']) || empty($_GET['email']) || empty($_GET['nivel_estudios']) || empty($_GET['situacion'])) {
    echo "<h1>Error: Faltan datos requeridos</h1>";
    echo "<p>Por favor, regresa al formulario y completa todos los campos obligatorios.</p>";
    exit;
}

// Recibir datos del formulario
$nombre = htmlspecialchars($_GET['nombre']);
$email = htmlspecialchars($_GET['email']);
$nivel_estudios = htmlspecialchars($_GET['nivel_estudios']);
$situacion = $_GET['situacion'];
$hobbies = $_GET['hobbies'];
$otro_hobby = htmlspecialchars($_GET['otro_hobby'] ?? '');

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del formulario</title>
</head>
<body>
    <h1>Información proporcionada</h1>

    <p><strong>Nombre:</strong> <?= $nombre ?></p>
    <p><strong>Correo electrónico:</strong> <?= $email ?></p>
    <p><strong>Nivel de estudios:</strong> <?= $nivel_estudios ?></p>

    <p><strong>Situación actual:</strong></p>
    <ul>
        <li><?php echo implode(', ', $situacion); ?></li>
    </ul>

    <p><strong>Hobbies:</strong></p>
    <ul>
        <li><?php echo implode(', ', $hobbies); ?></li>
        <?php if (!empty($otro_hobby)): ?>
            <li><?php echo $otro_hobby; ?></li>
        <?php endif; ?>
    </ul>

    <p><a href="23-formulario.php">Volver al formulario</a></p>
</body>
</html>
