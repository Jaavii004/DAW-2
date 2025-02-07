<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

$url = "https://www.meteomontserrat.com/TiempoActual.htm";
$html = file_get_contents($url);

$doc = new DOMDocument();
@$doc->loadHTML($html);

$tables = $doc->getElementsByTagName('table');
$table = $tables->item(0);

$rows = $table->getElementsByTagName('tr');

$data = array();

foreach ($rows as $row) {
    $cells = $row->getElementsByTagName('td');
    if ($cells->length == 2) {
        $parameter = trim($cells->item(0)->nodeValue);
        $value = trim($cells->item(1)->nodeValue);
        $data[$parameter] = $value;
    }
}

// print_r($data);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pronóstico del Tiempo - Montserrat</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* Reset global styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body */
        body {
            font-family: 'Poppins', sans-serif;
            background-image: url('./ti.jpg');
            filter: brightness(80%);
            /* Asegúrate de usar una imagen real */
            background-size: cover;
            background-position: center;
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            /* Asegura que la página ocupe toda la altura de la ventana */
            overflow-x: hidden;
            background-attachment: fixed;
        }

        /* Main container */
        .container {
            display: grid;
            grid-template-columns: 1fr;
            grid-gap: 40px;
            width: 90%;
            max-width: 1200px;
            background-color: rgba(0, 0, 0, 0.7);
            border-radius: 20px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
            margin-top: 20px;
            /* Ajuste para que haya espacio en la parte superior */
        }

        /* Title */
        h1 {
            font-size: 48px;
            font-weight: 600;
            color: #fff;
            text-transform: uppercase;
            margin-bottom: 30px;
            letter-spacing: 2px;
            text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
        }

        /* Weather cards */
        .weather-cards {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            /* Permite agregar más cartas */
            gap: 20px;
            transition: grid-template-columns 0.3s ease-in-out;
        }

        .weather-card {
            background-color: #2a3b58;
            color: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .weather-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        }

        /* Different colors for weather types */
        .weather-card.sunny {
            background-color: #f2c94c;
        }

        .weather-card.cloudy {
            background-color: #bdbdbd;
        }

        .weather-card.rainy {
            background-color: #4f8ea0;
        }

        .weather-card.snowy {
            background-color: #74b9ff;
        }

        /* Icon styles */
        .icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        /* Temperature */
        .temperature {
            font-size: 55px;
            font-weight: bold;
            margin-bottom: 15px;
            color: #FF8C00;
        }

        /* Description */
        .description {
            font-size: 18px;
            color: #f0f0f0;
        }

        /* Barometer */
        .barometer {
            width: 100%;
            height: 8px;
            background-color: #ddd;
            border-radius: 5px;
            margin-top: 10px;
        }

        .barometer .progress {
            height: 100%;
            border-radius: 5px;
            transition: width 0.3s ease;
        }

        /* Footer */
        .footer {
            font-size: 16px;
            color: #bbb;
            margin-top: 50px;
        }

        /* Animations */
        .fadeIn {
            animation: fadeIn 1.5s ease-out;
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                transform: translateY(50px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @media (max-width: 768px) {
            .container {
                width: 90%;
                padding: 20px;
            }
        }
    </style>
</head>

<body>

    <div class="container fadeIn">
        <h1>Montserrat-Casadalt, Valencia, Spain (225m)</h1>

        <div class="weather-cards">
            <!-- Sunny Card -->
            <div class="weather-card sunny">
                <div class="icon">☀️</div>
                <div class="temperature"><?= $data['Temperatura'] ?></div>
                <div class="description">Día soleado con cielos despejados</div>
                <div class="barometer">
                    <div class="progress" style="width: 90%; background-color: #FF8C00;"></div>
                </div>
            </div>

            <!-- Cloudy Card -->
            <div class="weather-card cloudy">
                <div class="icon">☁️</div>
                <div class="temperature"><?= $data['Humedad'] ?></div>
                <div class="description">Nublado, sin lluvias</div>
                <div class="barometer">
                    <div class="progress" style="width: 60%; background-color: #BDC3C7;"></div>
                </div>
            </div>

            <!-- Rainy Card -->
            <div class="weather-card rainy">
                <div class="icon">🌧️</div>
                <div class="temperature">17°C</div>
                <div class="description">Lluvias ligeras, viento moderado</div>
                <div class="barometer">
                    <div class="progress" style="width: 40%; background-color: #3498db;"></div>
                </div>
            </div>

            <!-- Snowy Card -->
            <div class="weather-card snowy">
                <div class="icon">❄️</div>
                <div class="temperature">0°C</div>
                <div class="description">Nevadas suaves y frías</div>
                <div class="barometer">
                    <div class="progress" style="width: 80%; background-color: #74b9ff;"></div>
                </div>
            </div>

            <!-- Puedes añadir más cartas aquí -->
        </div>

        <!-- Carrusel de imágenes -->
        <div id="carouselExample" class="carousel slide mt-5">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="https://www.meteomontserrat.com/capturas/captura.jpg" class="d-block w-100" alt="Imagen 1">
                </div>
                <div class="carousel-item">
                    <img src="https://www.meteomontserrat.com/capturas/captura2.jpg" class="d-block w-100" alt="Imagen 2">
                </div>
                <div class="carousel-item">
                    <img src="https://www.meteomontserrat.com/capturas/captura3.jpg" class="d-block w-100" alt="Imagen 3">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

        <!-- Additional Weather Data Section -->
        <div class="additional-info">
            <h3>Más Datos del Clima</h3>
            <p><strong>Temperatura Actual:</strong> <?= $data['Temperatura'] ?></p>
            <p><strong>Humedad Actual:</strong> <?= $data['Humedad'] ?></p>
            <p><strong>Punto de Rocío:</strong> <?= $data['Punto de Rocío'] ?></p>
            <p><strong>Viento:</strong> <?= $data['Viento'] ?> </p>
            <p><strong>Presión Barométrica:</strong> <?= $data['Barómetro'] ?> </p>
            <p><strong>Rápida Tasa de Lluvias:</strong> <?= $data['Tasa de Lluvia'] ?> </p>
            <p><strong>Lluvias Mensuales:</strong> <?= $data['Lluvia del Mes'] ?> </p>
            <p><strong>Lluvias Anuales:</strong> <?= $data['Lluvia del Año'] ?> </p>
        </div>


        <div class="footer">
            <p>Actualizado el 7 de febrero de 2025 | Pronóstico por Montserrat Weather</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>