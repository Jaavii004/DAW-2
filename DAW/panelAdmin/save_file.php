<?php
if (isset($_POST['file']) && isset($_POST['content'])) {
    $file = './' . $_POST['file']; // Ajusta esta ruta al directorio de tus archivos
    if (file_put_contents($file, $_POST['content']) !== false) {
        echo 'Archivo guardado exitosamente.';
    } else {
        echo 'Error al guardar el archivo.';
    }
}
?>
