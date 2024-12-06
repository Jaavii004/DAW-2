<?php
/**
 * @Author: Javier Puertas
 */

// 24. Escribe un formulario de recogida de datos que conste de dos páginas: En la primera página
// se solicitan los datos y se muestran errores tras validarlos. En la segunda página se muestra toda
// la información introducida por el usuario si no hay errores errores. Los datos a introducir son:
// Nombre, Apellidos, Edad, Peso (entre 10 y 150), Sexo, Estado Civil (Soltero, Casado, Viudo,
// Divorciado, Otro) Aficiones: Cine, Deporte, Literatura, Música, Cómics, Series, Videojuegos.
// Debe tener los botones de Enviar y Borrar
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado del Formulario</title>
</head>
<body>
    <h1>Resultado del Formulario</h1>

    <p><strong>Nombre:</strong> <?php echo $_GET['nombre']; ?></p>
    <p><strong>Apellidos:</strong> <?php echo $_GET['apellidos']; ?></p>
    <p><strong>Edad:</strong> <?php echo $_GET['edad']; ?></p>
    <p><strong>Peso:</strong> <?php echo $_GET['peso']; ?> kg</p>
    <p><strong>Sexo:</strong> <?php echo $_GET['sexo'] ; ?></p>
    <p><strong>Estado Civil:</strong> <?php echo $_GET['estado_civil'] ; ?></p>

    <p><strong>Aficiones:</strong> <?php echo $_GET['aficiones']; ?></p>

    <a href="24-formulario.php">Volver al formulario</a>
</body>
</html>