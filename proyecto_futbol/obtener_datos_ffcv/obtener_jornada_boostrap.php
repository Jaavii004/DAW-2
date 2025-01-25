<?php
// Configuración para mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// URL base para las jornadas
$base_url = "https://resultadosffcv.isquad.es/total_partidos.php?id_torneo=903498684&jornada=";
$id_temp = "&id_temp=20&id_modalidad=33327&id_competicion=903498682"; // Parámetros fijos

$equipoBuscado = "U.D. Rocafort C.F. 'A'"; // Cambia esto por el nombre del equipo que buscas

// Función para obtener el contenido HTML de una URL
function getHtmlContent($url) {
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/87.0.4280.88 Safari/537.36');
    $html = curl_exec($ch);
    if (curl_errno($ch)) {
        die("Error: " . curl_error($ch));
    }
    curl_close($ch);
    return $html;
}

// Función para extraer los partidos del HTML
function extractMatches($html, $equipoBuscado, $jornada) {
    $dom = new DOMDocument();
    libxml_use_internal_errors(true); // Suprime los errores de advertencia de HTML
    $dom->loadHTML($html);
    libxml_clear_errors(); // Limpia los errores después de cargar el HTML

    $xpath = new DOMXPath($dom);
    $partidos = $xpath->query("//tr[td[contains(@class, 'td_nombre_resultados')]]");

    $matches = [];
    foreach ($partidos as $partido) {
        $equipoLocal = $xpath->query(".//td[contains(@class, 'td_nombre_resultados')][1]/a", $partido);
        $equipoVisitante = $xpath->query(".//td[contains(@class, 'td_nombre_resultados')][2]/a", $partido);
        $hora = $xpath->query(".//span[contains(@class, 'hora_marcador')]", $partido);
        
        if ($equipoLocal->length > 0 && $equipoVisitante->length > 0 && $hora->length > 0) {
            $localNombre = trim($equipoLocal->item(0)->nodeValue);
            $visitanteNombre = trim($equipoVisitante->item(0)->nodeValue);
            $fecha = $xpath->query(".//span[contains(@class, 'fecha_marcador')]", $partido); 
            $fechaPartido = $fecha->length > 0 ? trim($fecha->item(0)->nodeValue) : '';
            $horaPartido = trim($hora->item(0)->nodeValue);

            if ($localNombre === $equipoBuscado || $visitanteNombre === $equipoBuscado) {
                $matches[] = [
                    'jornada' => $jornada,
                    'equipo' => $equipoBuscado,
                    'oponente' => $localNombre === $equipoBuscado ? $visitanteNombre : $localNombre,
                    'condicion' => $localNombre === $equipoBuscado ? "Local" : "Visitante",
                    'hora' => $horaPartido
                ];
            }
        }
    }
    return $matches;
}

// Recorrer las jornadas
$allMatches = [];
for ($jornada = 0; $jornada <= 30; $jornada++) { // Ajusta el número de jornadas según sea necesario
    $url = $base_url . $jornada . $id_temp;
    $html = getHtmlContent($url);

    if (empty($html)) {
        die("Error: El contenido HTML está vacío para la jornada $jornada.");
    }

    $matches = extractMatches($html, $equipoBuscado, $jornada);
    $allMatches = array_merge($allMatches, $matches);
}

// Mostrar los resultados en una tabla con Bootstrap
echo '<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Partidos de ' . $equipoBuscado . '</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Partidos de ' . $equipoBuscado . '</h1>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Jornada</th>
                    <th>Equipo</th>
                    <th>Oponente</th>
                    <th>Condición</th>
                    <th>Hora</th>
                </tr>
            </thead>
            <tbody>';

foreach ($allMatches as $match) {
    echo '<tr>
            <td>' . $match['jornada'] . '</td>
            <td>' . $match['equipo'] . '</td>
            <td>' . $match['oponente'] . '</td>
            <td>' . $match['condicion'] . '</td>
            <td>' . $match['hora'] . '</td>
          </tr>';
}

echo '      </tbody>
        </table>
    </div>
</body>
</html>';
?>