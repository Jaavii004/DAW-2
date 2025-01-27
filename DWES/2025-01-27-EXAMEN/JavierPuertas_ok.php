<?php
/**
 * @Author:  Javier Puertas
 */

// Recibimos los datos ya validados por GET
if ($_GET['LOPDGDD'] === 'on'){
    $lopd =  ' Has acceptado la LOPDGDD';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Procesado</title>
</head>
<body>
    <h1 style="color: blue">Sus datos han sido enviados correctamente. - <?php echo $_GET['nombre']; ?></h1>
    <p><em>Nombre: </em> <strong><?php echo strtoupper($_GET['nombre']); ?></strong></p>
    <p><em>Email: </em><strong><?php echo strtoupper($_GET['email']); ?></strong></p>
    <p><em>User: </em><strong><?php echo strtoupper($_GET['user']); ?></strong></p>
    <p><em>Contraseña: </em><strong><?php echo strtoupper($_GET['contrasena']); ?></strong></p>
    <p><em>Situacion: </em><strong><?php echo strtoupper($_GET['situacion']); ?></strong></p>
    <p><em>Población afectada: </em><strong><?php echo strtoupper($_GET['plb_afectada']); ?></strong></p>
    <p><em>Elementos Afectados: </em><strong><?php echo strtoupper($_GET['ElementosAfectados']); ?></strong></p>
    <p><em>Necesidades: </em><strong><?php echo strtoupper($_GET['Necesidades']); ?></strong></p>
    <p><em>LOPDGDD: </em><strong><?php echo strtoupper($lopd); ?></strong></p>

    <p><em>Url foto: </em><strong><?php echo strtoupper($_GET['ruta_img']); ?></strong></p>
    <p><em>Foto:</em></p>
    <img src="<?php echo $_GET['ruta_img']; ?>" alt="Foto Adjunta" style="max-width: 150px;">
</body>
</html>