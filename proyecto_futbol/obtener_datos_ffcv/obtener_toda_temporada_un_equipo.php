<?php
// Errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// URL del calendario del equipo U.D. Rocafort C.F. 'A'
$url = "https://resultadosffcv.isquad.es/equipo_calendario.php?id_temp=20&id_modalidad=33327&id_competicion=903498682&id_equipo=27182&torneo_equipo=903498684&id_torneo=903498684";

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

// Comprobar si el HTML está vacío
if (empty($html)) {
    die("Error: El contenido HTML está vacío.");
}

$dom = new DOMDocument();
libxml_use_internal_errors(true); // Suprime los errores de advertencia de HTML
$dom->loadHTML($html);
libxml_clear_errors(); // Limpia los errores después de cargar el HTML

// Crear un objeto XPath
$xpath = new DOMXPath($dom);

// Obtener todas las filas de los partidos
$partidos = $xpath->query("//tr[not(contains(@class, 'info_jornada'))]");

$resultados = [];

foreach ($partidos as $partido) {
    $equipoLocal = $xpath->query(".//td[contains(@class, 'p-t-20')]/a[1]", $partido);
    $equipoVisitante = $xpath->query(".//td[contains(@class, 'p-t-20')]/a[2]", $partido);
    $golesLocal = $xpath->query(".//td[contains(@class, 'centrado p-t-20')]/span[1]", $partido);
    $golesVisitante = $xpath->query(".//td[contains(@class, 'centrado p-t-20')]/span[2]", $partido);
    $fecha = $xpath->query(".//td[contains(@style, 'font-size: 12px')]/div[1]", $partido);
    $hora = $xpath->query(".//td[contains(@style, 'font-size: 12px')]/div[2]", $partido);

    if ($equipoLocal->length > 0 && $equipoVisitante->length > 0 && $golesLocal->length > 0 && $golesVisitante->length > 0 && $fecha->length > 0 && $hora->length > 0) {
        $localNombre = trim($equipoLocal->item(0)->nodeValue);
        $visitanteNombre = trim($equipoVisitante->item(0)->nodeValue);
        $golesLocalNum = trim($golesLocal->item(0)->nodeValue);
        $golesVisitanteNum = trim($golesVisitante->item(0)->nodeValue);
        $fechaPartido = trim($fecha->item(0)->nodeValue);
        $horaPartido = trim($hora->item(0)->nodeValue);

        // Verificar si el equipo buscado es local o visitante
        if ($localNombre === "U.D. Rocafort C.F. 'A'" || $visitanteNombre === "U.D. Rocafort C.F. 'A'") {
            $resultado = [
                'fecha' => $fechaPartido,
                'hora' => $horaPartido,
                'local' => $localNombre,
                'visitante' => $visitanteNombre,
                'goles_local' => $golesLocalNum,
                'goles_visitante' => $golesVisitanteNum,
                'es_local' => $localNombre === "U.D. Rocafort C.F. 'A'" // true si es local
            ];
            $resultados[] = $resultado;
        }
    }
}

// Mostrar resultados en una tabla Bootstrap
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title>Resultados U.D. Rocafort C.F. 'A'</title>
</head>
<body>
<div class="container mt-5">
    <h2>Resultados de U.D. Rocafort C.F. 'A'</h2>
    <?php if (!empty($resultados)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Fecha</th>
                <th>Hora</th>
                <th>Equipo Local</th>
                <th>Equipo Visitante</th>
                <th>Resultado</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($resultados as $partido): ?>
                <tr>
                    <td><?php echo $partido['fecha']; ?></td>
                    <td><?php echo $partido['hora']; ?></td>
                    <td><?php echo $partido['local']; ?></td>
                    <td><?php echo $partido['visitante']; ?></td>
                    <td>
                        <?php 
                        if ($partido['es_local']) {
                            echo "{$partido['goles_local']} - {$partido['goles_visitante']}";
                        } else {
                            echo "{$partido['goles_visitante']} - {$partido['goles_local']}";
                        }
                        ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>No se encontraron partidos para U.D. Rocafort C.F. 'A'.</p>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
