<?php
/**
 * @Author: Javier Puertas
 */

// 25. Crea una Web para obtener los siguientes datos: Nombre completo, Contraseña mínimo 6
// caracteres, Nivel de EstudiosSin estudios, Educación Secundaria Obligatoria, Bachillerato,
// Formación Profesional, Estudios Universitarios, Nacionalidad Española, Otra, Idiomas
// Español, Inglés, Francés, Alemán Italiano, Email, Adjuntar Foto sólo extensiones jpg, gif y
// png, tamaño máximo 50 KB. Además de las comprobaciones de validación, se debe comprobar
// que sube fichero, que el fichero tiene extensión puedes usar explode y ésta es válida, que hay
// directorio donde guardarlo y que se genera con nombre único. Si todo ha ido bien, redirige al
// usuario a una página donde se le indique que se ha procesado con éxito e incluye tu nombre y
// grupo de clase.

session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Procesado</title>
</head>
<body>
    <h1>Formulario procesado con éxito</h1>
    <p style="color: green">Tu formulario se ha enviado correctamente.</p>
    <p>Nombre: <?php echo isset($_SESSION['nombre']) ? $_SESSION['nombre'] : 'No disponible'; ?></p>
    <p>Contraseña: <?php echo isset($_SESSION['contrasena']) ? $_SESSION['contrasena'] : 'No disponible'; ?></p>
    <p>Nivel de Estudios: <?php echo isset($_SESSION['nivel_estudios']) ? $_SESSION['nivel_estudios'] : 'No disponible'; ?></p>
    <p>Nacionalidad: <?php echo isset($_SESSION['nacionalidad']) ? $_SESSION['nacionalidad'] : 'No disponible'; ?></p>
    <p>Idiomas: <?php echo isset($_SESSION['idiomas']) ? implode(', ', $_SESSION['idiomas']) : 'No disponible'; ?></p>
    <p>Email: <?php echo isset($_SESSION['email']) ? $_SESSION['email'] : 'No disponible'; ?></p>
    <p>Url foto: <?php echo isset($_SESSION['ruta_img']) ? $_SESSION['ruta_img'] : 'No disponible'; ?></p>
    <p>Foto:</p>
    <img src="<?php echo isset($_SESSION['ruta_img']) ? $_SESSION['ruta_img'] : ''; ?>" alt="Foto Adjunta" style="max-width: 150px;">
</body>
</html>
