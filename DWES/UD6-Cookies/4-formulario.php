<?php

/**
 * @Author: Javier Puertas
 */

// Usa el formulario (Ejercicio 2 UD5) de la quincena donde se indique el día de la semana y
// muestre la quincena guardando estos datos en una Cookie. Se deben mostrar el día y la
// quincena actual y el día y la quincena anterior (cookie).
 
// Recuperar los valores anteriores antes de sobrescribir
$dia_anterior = isset($_COOKIE['quincena']) ? json_decode($_COOKIE['quincena'], true)['dia'] : 'Ninguno';
$quincena_anterior = isset($_COOKIE['quincena']) ? json_decode($_COOKIE['quincena'], true)['quincena'] : 'Ninguna';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['fecha'])) {
    // Obtener el día enviado por el formulario
    $dia_actual = $_POST['fecha'];

    // Determinar la quincena según el día
    $quincena_actual = ($dia_actual <= 15) ? "Primera" : "Segunda";

    $quincena = array(
        'dia' => $dia_actual,
        'quincena' => $quincena_actual
    );

    $quincena_json = json_encode($quincena);

    setcookie("quincena", $quincena_json, time() + 3600);
} else {
    $dia_actual = $dia_anterior;
    $quincena_actual = $quincena_anterior;
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quincena</title>
</head>
<body>
    <h1>Determinar Quincena</h1>
    <form action="" method="post">
        <label for="fecha">Selecciona una fecha:</label>
        <select id="fecha" name="fecha" required>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
            <option value="24">24</option>
            <option value="25">25</option>
            <option value="26">26</option>
            <option value="27">27</option>
            <option value="28">28</option>
            <option value="29">29</option>
            <option value="30">30</option>
        </select>
        <input type="submit" value="Enviar">
    </form>

    <h2>Datos actuales:</h2>
    <p>Día: <?php echo $dia_actual; ?></p>
    <p>Quincena: <?php echo $quincena_actual; ?></p>

    <h2>Datos anteriores (cookies):</h2>
    <p>Día anterior: <?php echo $dia_anterior; ?></p>
    <p>Quincena anterior: <?php echo $quincena_anterior; ?></p>
</body>
</html>
