<?php
// Errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// URL base para las jornadas
$base_url = "https://resultadosffcv.isquad.es/total_partidos.php?id_torneo=903498684&jornada=";
$id_temp = "&id_temp=20&id_modalidad=33327&id_competicion=903498682"; // Parámetros fijos

$equipoBuscado = "U.D. Rocafort C.F. 'A'"; // Cambia esto por el nombre del equipo que buscas

// Recorrer las jornadas
for ($jornada = 0; $jornada <= 30; $jornada++) { // Ajusta el número de jornadas según sea necesario
    $url = $base_url . $jornada . $id_temp;

    // Inicializar cURL
    $ch = curl_init($url);

    // Configurar opciones de cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36');

    // Ejecutar la petición
    $html = curl_exec($ch);

    // Comprobar errores de cURL
    if (curl_errno($ch)) {
        die("Error: " . curl_error($ch));
    }

    // Cerrar la sesión de cURL
    curl_close($ch);

    if (empty($html)) {
        die("Error: El contenido HTML está vacío para la jornada $jornada.");
    }

    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // Suprime los errores de advertencia de HTML
    $dom->loadHTML($html);
    libxml_clear_errors(); // Limpia los errores después de cargar el HTML

    // Crear un objeto XPath
    $xpath = new DOMXPath($dom);

    // Modificar el XPath para seleccionar las filas de los partidos
    $partidos = $xpath->query("//tr[td[contains(@class, 'td_nombre_resultados')]]");

    foreach ($partidos as $partido) {
        $equipoLocal = $xpath->query(".//td[contains(@class, 'td_nombre_resultados')][1]/a", $partido);
        $equipoVisitante = $xpath->query(".//td[contains(@class, 'td_nombre_resultados')][2]/a", $partido);
        $hora = $xpath->query(".//span[contains(@class, 'hora_marcador')]", $partido);
        
        if ($equipoLocal->length > 0 && $equipoVisitante->length > 0 && $hora->length > 0) {
            $localNombre = trim($equipoLocal->item(0)->nodeValue);
            $visitanteNombre = trim($equipoVisitante->item(0)->nodeValue);
            $horaPartido = trim($hora->item(0)->nodeValue);

            // Verificar si el equipo buscado es local o visitante
            if ($localNombre === $equipoBuscado || $visitanteNombre === $equipoBuscado) {
                echo "Jornada $jornada: " . ($localNombre === $equipoBuscado ? "Local" : "Visitante") . ": " . $equipoBuscado . " - " . ($localNombre === $equipoBuscado ? $visitanteNombre : $localNombre) . " - Hora: $horaPartido\n";
            }
        }
    }
}
?>
