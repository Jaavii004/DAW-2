<?php
/**
 * @Author: Javier Puertas
 */

// 13. Formulario 1, petición por GET y mostrar en NombreAlumnoForm1OK.php los resultados
// indicando el campo en cursiva y el contenido en negrita
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados del Formulario 1</title>
</head>
<body>
    <h1>Resultados del Formulario 1</h1>
    <p><em>Nombre:</em> <strong><?php echo $_GET['nombre']; ?></strong></p>
    <p><em>Apellidos:</em> <strong><?php echo $_GET['apellidos']; ?></strong></p>
    <p><em>Sexo:</em> <strong><?php echo $_GET['sexo']; ?></strong></p>
    <p><em>Correo electrónico:</em> <strong><?php echo $_GET['correo']; ?></strong></p>
    <p><em>Provincia:</em> <strong><?php echo $_GET['provincia']; ?></strong></p>
    <p><em>Recibir información:</em> <strong><?php echo isset($_GET['informacion']) ? 'Sí' : 'No'; ?></strong></p>
    <p><em>Aceptar condiciones:</em> <strong><?php echo isset($_GET['condiciones']) ? 'Sí' : 'No'; ?></strong></p>
</body>

</html>
