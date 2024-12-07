<?php

/**
 * @Author: Javier Puertas
 */

// 14. Formulario 2, petición por POST y mostrar en JavierPuertasForm2OK.php los resultados
// indicando el campo en cursiva y el contenido en negrita.

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del Formulario 2</title>
</head>
<body>
    <h1>Resultados del Formulario 2</h1>
    <p><em>Nombre:</em> <strong><?php echo $_POST['nombre']; ?></strong></p>
    <p><em>Apellidos:</em> <strong><?php echo $_POST['apellidos']; ?></strong></p>
    <p><em>Correo electrónico:</em> <strong><?php echo $_POST['correo']; ?></strong></p>
    <p><em>Usuario:</em> <strong><?php echo $_POST['usuario']; ?></strong></p>
    <p><em>Contraseña:</em> <strong><?php echo $_POST['password']; ?></strong></p>
    <p><em>Sexo:</em> <strong><?php echo $_POST['sexo']; ?></strong></p>
    <p><em>Provincia:</em> <strong><?php echo $_POST['provincia']; ?></strong></p>
    <p><em>Situación:</em> <strong><?php echo implode(", ", $_POST['situacion']); ?></strong></p>
    <p><em>Comentario:</em> <strong><?php echo $_POST['comentario']; ?></strong></p>
    <p><em>Recibir información:</em> <strong><?php echo isset($_POST['informacion']) ? 'Sí' : 'No'; ?></strong></p>
    <p><em>Aceptar condiciones:</em> <strong><?php echo isset($_POST['condiciones']) ? 'Sí' : 'No'; ?></strong></p>
</body>
</html>