<?php

/**
 * @Author: Javier Puertas
 */

// 15. Formulario 3, petición por POST y mostrar en NombreAlumnoForm3OK.php los resultados
// indicando el campo en cursiva y el contenido en negrita

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Formulario 3 - 15</title>
</head>
<body>
    <h1>Resultados del Formulario 3 - 15</h1>
    <p><em>Nombre:</em> <strong><?php echo $_POST['nombre']; ?></strong></p>
    <p><em>Apellidos:</em> <strong><?php echo $_POST['apellidos']; ?></strong></p>
    <p><em>Correo electrónico:</em> <strong><?php echo $_POST['email']; ?></strong></p>
    <p><em>Nombre de usuario:</em> <strong><?php echo $_POST['usuario']; ?></strong></p>
    <p><em>Password:</em> <strong><?php echo $_POST['password']; ?></strong></p>
    <p><em>Sexo:</em> <strong><?php echo $_POST['sexo']; ?></strong></p>
    <p><em>Provincia:</em> <strong><?php echo $_POST['provincia']; ?></strong></p>
    <p><em>Horario de contacto:</em> <strong><?php echo implode(", ", $_POST['horario']); ?></strong></p>
    <p><em>¿Cómo nos ha conocido?:</em> <strong><?php echo isset($_POST['conocido']) ? implode(", ", $_POST['conocido']) : 'No especificado'; ?></strong></p>
    <p><em>Comentario:</em> <strong><?php echo $_POST['comentario']; ?></strong></p>
    <p><em>Recibir información:</em> <strong><?php echo isset($_POST['informacion']) ? 'Ha seleccionado recibir ofertas' : 'No ha seleccionado recibir ofertas'; ?></strong></p>
    <p><em>Aceptar condiciones:</em> <strong><?php echo isset($_POST['condiciones']) ? 'Sí' : 'No'; ?></strong></p>
</body>
</html>