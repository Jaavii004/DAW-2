<?php
// Establece la cabecera para indicar que se devuelve JSON
header("Content-Type: application/json; charset=utf-8");

// URL de la página de meteorología
$url = "https://www.meteomontserrat.com/TiempoActual.htm";

// Obtener el contenido HTML de la página
$html = file_get_contents($url);
if ($html === false) {
    echo json_encode(["error" => "No se pudo obtener el HTML de la página."]);
    exit;
}

// Cargar el HTML en un objeto DOM
$doc = new DOMDocument();
@$doc->loadHTML($html);

// Buscar la primera tabla (donde se encuentran los datos)
$tables = $doc->getElementsByTagName('table');
if ($tables->length == 0) {
    echo json_encode(["error" => "No se encontró ninguna tabla en el HTML."]);
    exit;
}

$table = $tables->item(0);
$rows = $table->getElementsByTagName('tr');

// Recorrer las filas y extraer las celdas con los parámetros y valores
$data = array();
foreach ($rows as $row) {
    $cells = $row->getElementsByTagName('td');
    if ($cells->length == 2) {
        $parameter = trim($cells->item(0)->nodeValue);
        $value = trim($cells->item(1)->nodeValue);
        $data[$parameter] = $value;
    }
}

// Extraer los datos deseados, asignando cadena vacía si no se encuentra la clave exacta
$fecha           = date("Y-m-d H:i:s");
$temperatura     = isset($data['Temperatura']) ? $data['Temperatura'] : "";
$humedad         = isset($data['Humedad']) ? $data['Humedad'] : "";
$punto_de_rocio  = isset($data['Punto de Rocío']) ? $data['Punto de Rocío'] : "";
$viento          = isset($data['Viento']) ? $data['Viento'] : "";
$barometro       = isset($data['Barómetro']) ? $data['Barómetro'] : "";
$lluvia_de_hoy   = isset($data['Lluvia de Hoy']) ? $data['Lluvia de Hoy'] : "";
$tasa_de_lluvia  = isset($data['Tasa de Lluvia']) ? $data['Tasa de Lluvia'] : "";
$lluvia_del_mes  = isset($data['Lluvia del Mes']) ? $data['Lluvia del Mes'] : "";
$lluvia_del_año  = isset($data['Lluvia del Año']) ? $data['Lluvia del Año'] : "";
$sensacion       = isset($data['Sensación']) ? $data['Sensación'] : "";

// Construir el array de salida
$json_data = array(
    "fecha"          => $fecha,
    "temperatura"    => $temperatura,
    "humedad"        => $humedad,
    "punto_de_rocio" => $punto_de_rocio,
    "viento"         => $viento,
    "barometro"      => $barometro,
    "lluvia_de_hoy"  => $lluvia_de_hoy,
    "tasa_de_lluvia" => $tasa_de_lluvia,
    "lluvia_del_mes" => $lluvia_del_mes,
    "lluvia_del_año" => $lluvia_del_año,
    "sensacion"      => $sensacion
);

// Devolver el JSON
echo json_encode($json_data);
