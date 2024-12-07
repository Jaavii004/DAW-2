<?php
class Logo {
    private $logoPath;
    
    // Constructor: se define el path de la imagen del logo
    public function __construct($path) {
        $this->logoPath = $path;
    }

    // Método para obtener el logo
    public function getLogo() {
        // Verificar si el archivo existe en la ruta proporcionada
        if (file_exists($this->logoPath)) {
            return $this->logoPath;
        } else {
            // Si no se encuentra el logo, devolver un logo por defecto o una imagen predeterminada
            return 'https://content.wepik.com/statics/30190099/preview-page0.jpg';  // Cambia esta URL por la de un logo por defecto
        }
    }
}
?>
