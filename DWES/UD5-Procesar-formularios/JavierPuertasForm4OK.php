<?php

/**
 * @Author: Javier Puertas
 */

// 16. Formulario 4, petición por POST y mostrar en NombreAlumnoForm1OK.php los resultados
// indicando el campo en cursiva y el contenido en negrita

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Formulario 4 - 16</title>
</head>
<body>
    <h1>Resultados del Formulario 4 - 16</h1>
    <p><em>Nombre:</em> <strong><?php echo $_POST['nombre']; ?></strong></p>
    <p><em>Apellidos:</em> <strong><?php echo $_POST['apellidos']; ?></strong></p>
    <p><em>Correo electrónico:</em> <strong><?php echo $_POST['email']; ?></strong></p>
    <p><em>Usuario:</em> <strong><?php echo $_POST['usuario']; ?></strong></p>
    <p><em>Password:</em> <strong><?php echo $_POST['password']; ?></strong></p>
    <p><em>Sexo:</em> <strong><?php echo $_POST['sexo']; ?></strong></p>
    <p><em>Provincia:</em> <strong><?php echo $_POST['provincia']; ?></strong></p>
    <p><em>Horario de contacto:</em> <strong><?php echo implode(", ", $_POST['horario']); ?></strong></p>
    <p><em>¿Cómo nos ha conocido?</em> <strong><?php echo implode(", ", $_POST['conocido']); ?></strong></p>
    <p><em>Tipo de incidencia:</em> <strong><?php echo $_POST['tipo-incidencia']; ?></strong></p>
    <p><em>Descripción de la incidencia:</em> <strong><?php echo $_POST['descripcion']; ?></strong></p>
</body>
</html>
