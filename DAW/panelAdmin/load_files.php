<?php
$directory = './'; // Ajusta esta ruta al directorio que deseas listar

// Comprueba que el directorio existe
if (is_dir($directory)) {
    $files = array_diff(scandir($directory), array('..', '.')); // Lee el directorio y excluye . y ..
    if ($files) {
        foreach ($files as $file) {
            if (is_file($directory . $file)) {
                echo '<li><a href="#" class="file-item" data-file="' . htmlspecialchars($file, ENT_QUOTES, 'UTF-8') . '">' . htmlspecialchars($file, ENT_QUOTES, 'UTF-8') . '</a></li>';
            }
        }
    } else {
        echo 'No hay archivos en el directorio.';
    }
} else {
    echo 'Directorio no encontrado.';
}
?>
