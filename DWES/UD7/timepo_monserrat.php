<!-- hay que activar chale/generate_json_history.php -->
<!-- LA url es https://gasolinerascercanas.es/json/weather_history.json -->
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estadísticas Meteorológicas Históricas</title>
    <!-- Incluyendo Bootstrap 5 y Chart.js -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f4f8fb;
        }

        .card-header {
            background-color: #007bff;
            color: white;
        }

        .card-body {
            background-color: white;
        }

        .chart-container {
            background: #f9f9f9;
            border-radius: 15px;
            padding: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .form-select {
            width: auto;
            display: inline-block;
        }

        #loadingSpinner {
            display: none;
        }

        .loadingMessage {
            text-align: center;
            font-size: 20px;
            color: #007bff;
            display: none;
        }
    </style>
</head>

<body>

    <div class="container mt-5">
        <!-- Selección de Rango de Tiempo -->
        <div class="row mb-4">
            <div class="col-md-6">
                <label for="timeRange" class="form-label">Selecciona el Rango de Tiempo:</label>
                <select class="form-select" id="timeRange">
                    <option value="week" selected>Semana</option>
                    <option value="month">Mes</option>
                    <option value="day">Día</option>
                </select>
            </div>
        </div>

        <!-- Card para mostrar las gráficas -->
        <div class="row mb-5">
            <div class="col-md-6">
                <div class="card chart-container">
                    <div class="card-header">
                        <h5>Gráfico de Temperaturas</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="tempChart"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card chart-container">
                    <div class="card-header">
                        <h5>Gráfico de Lluvias</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="rainChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Estadísticas -->
        <div class="row mb-5">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Promedio Temperatura</h5>
                    </div>
                    <div class="card-body">
                        <p id="avgTemp" class="text-center">Cargando...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Promedio Humedad</h5>
                    </div>
                    <div class="card-body">
                        <p id="avgHumedad" class="text-center">Cargando...</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Máximo Viento</h5>
                    </div>
                    <div class="card-body">
                        <p id="maxViento" class="text-center">Cargando...</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tabla de Datos -->
        <div class="card">
            <div class="card-header">
                <h5>Datos Históricos</h5>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Temperatura</th>
                            <th>Humedad</th>
                            <th>Viento</th>
                        </tr>
                    </thead>
                    <tbody id="dataTable">
                        <!-- Las filas se generarán con JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Mensaje de carga -->
        <div id="loadingMessage" class="loadingMessage">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <p>Cargando datos, por favor espera...</p>
        </div>
    </div>

    <script>
        // Realizar la solicitud con cabecera para evitar problemas de CORS
        // Usamos CORS-anywhere para evitar problemas de CORS
        async function fetchWeatherData() {
            try {
                // // Mostrar el mensaje de carga
                // document.getElementById("loadingMessage").style.display = "block";

                // // Usamos el proxy CORS para evitar restricciones
                // const corsProxyUrl = 'https://cors-anywhere.herokuapp.com/';
                // const apiUrl = 'https://gasolinerascercanas.es/json/weather_history.json';

                // const response = await fetch(corsProxyUrl + apiUrl, {
                //     method: 'GET',
                //     headers: {
                //         'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/91.0.4472.124 Safari/537.36'
                //     }
                // });

                // const data = await response.json();

                // // Ocultar el mensaje de carga después de obtener los datos
                // document.getElementById("loadingMessage").style.display = "none";

                const response = await fetch('../json/weather_history.json');
                const data = await response.json();

                // Procesamos los datos
                processData(data);
            } catch (error) {
                console.error("Error al obtener los datos:", error);
                document.getElementById("loadingMessage").innerHTML = "<p>Error al cargar los datos. Inténtalo nuevamente.</p>";
            }
        }
        function processData(data) {
            // Calcular estadísticas y mostrar los gráficos
            const timeRange = document.getElementById('timeRange').value;
            const groupedData = groupDataByRange(data, timeRange);

            // Calcular las medias para cada mes
            const monthlyAverages = calculateMonthlyAverages(groupedData);

            // Llamar para llenar la tabla con los promedios por mes
            fillDataTable(monthlyAverages);

            // Calcular y mostrar las estadísticas generales (opcional)
            const flatData = [].concat(...Object.values(groupedData));
            calculateStatistics(flatData);

            // Mostrar los gráficos (por mes)
            showCharts(groupedData);
        }


        function groupDataByRange(filteredData, range) {
            const grouped = {};

            filteredData.forEach(item => {
                const date = new Date(item.fecha);
                let groupKey;

                if (range === 'month') {
                    // Agrupar por mes y año (ej. "Enero 2025")
                    groupKey = `${date.toLocaleString('default', { month: 'long' })} ${date.getFullYear()}`;
                } else if (range === 'week') {
                    // Si fuera por semana, podríamos hacer algo similar, pero en este caso se agrupará por mes
                    const weekNumber = getWeekNumber(date);
                    groupKey = `Semana ${weekNumber}`;
                } else {
                    // Caso de día (opcional, si lo necesitaras en algún punto)
                    groupKey = formatDate(item.fecha);
                }

                if (!grouped[groupKey]) {
                    grouped[groupKey] = [];
                }

                grouped[groupKey].push(item);
            });

            return grouped;
        }

        function calculateMonthlyAverages(groupedData) {
            const monthlyAverages = [];

            Object.keys(groupedData).forEach(groupKey => {
                const group = groupedData[groupKey];
                let totalTemp = 0, totalHumedad = 0, totalViento = 0;
                let validDataCount = 0;

                group.forEach(item => {
                    const temp = parseFloat(item.temperatura.replace('°C', '').trim());
                    const humedad = parseInt(item.humedad.replace('%', '').trim());
                    const viento = parseFloat(item.viento.match(/\d+(\.\d+)?/)[0]);

                    if (!isNaN(temp) && !isNaN(humedad) && !isNaN(viento)) {
                        totalTemp += temp;
                        totalHumedad += humedad;
                        totalViento += viento;
                        validDataCount++;
                    }
                });

                if (validDataCount > 0) {
                    const avgTemp = totalTemp / validDataCount;
                    const avgHumedad = totalHumedad / validDataCount;
                    const avgViento = totalViento / validDataCount;

                    monthlyAverages.push({
                        month: groupKey,
                        avgTemp: avgTemp.toFixed(1),
                        avgHumedad: avgHumedad.toFixed(1),
                        avgViento: avgViento.toFixed(1)
                    });
                }
            });

            return monthlyAverages;
        }



        function getWeekNumber(date) {
            const start = new Date(date.getFullYear(), 0, 1);
            const diff = date - start;
            const oneDay = 1000 * 60 * 60 * 24;
            const dayOfYear = Math.floor(diff / oneDay);
            return Math.ceil(dayOfYear / 7);
        }

        function formatDate(dateStr) {
            const date = new Date(dateStr);
            return `${date.getDate()}/${date.getMonth() + 1}/${date.getFullYear()}`;
        }

        function calculateStatistics(data) {
            let totalTemp = 0, totalHumedad = 0, maxViento = 0;
            let validDataCount = 0;

            data.forEach(item => {
                // Convertir valores de temperatura y humedad correctamente
                const temp = parseFloat(item.temperatura.replace('°C', '').trim());
                const humedad = parseInt(item.humedad.replace('%', '').trim());
                const viento = parseFloat(item.viento.match(/\d+(\.\d+)?/)[0]);

                // Asegurarse de que los valores son válidos antes de sumarlos
                if (!isNaN(temp) && !isNaN(humedad) && !isNaN(viento)) {
                    totalTemp += temp;
                    totalHumedad += humedad;
                    if (viento > maxViento) {
                        maxViento = viento;
                    }
                    validDataCount++;
                }
            });

            if (validDataCount > 0) {
                const avgTemp = totalTemp / validDataCount;
                const avgHumedad = totalHumedad / validDataCount;

                document.getElementById('avgTemp').textContent = `${avgTemp.toFixed(1)}°C`;
                document.getElementById('avgHumedad').textContent = `${avgHumedad.toFixed(1)}%`;
            } else {
                document.getElementById('avgTemp').textContent = "Datos insuficientes";
                document.getElementById('avgHumedad').textContent = "Datos insuficientes";
            }
            document.getElementById('maxViento').textContent = `${maxViento.toFixed(1)} km/h`;
        }


        function fillDataTable(monthlyAverages) {
            const tableBody = document.getElementById('dataTable');
            tableBody.innerHTML = '';

            // Llenar la tabla con los promedios por mes
            monthlyAverages.forEach(item => {
                const row = document.createElement('tr');
                row.innerHTML = `
            <td>${item.month}</td>
            <td>${item.avgTemp}°C</td>
            <td>${item.avgHumedad}%</td>
            <td>${item.avgViento} km/h</td>
        `;
                tableBody.appendChild(row);
            });
        }

        let tempChartInstance = null;
        let rainChartInstance = null;

        function showCharts(groupedData) {
            const ctxTemp = document.getElementById('tempChart').getContext('2d');
            const ctxRain = document.getElementById('rainChart').getContext('2d');

            // Si el gráfico ya existe, destruirlo
            if (tempChartInstance) {
                tempChartInstance.destroy();
            }

            if (rainChartInstance) {
                rainChartInstance.destroy();
            }

            const tempData = {
                labels: Object.keys(groupedData),
                datasets: [{
                    label: 'Temperatura (°C)',
                    data: Object.values(groupedData).map(group => {
                        return group.reduce((sum, item) => sum + parseFloat(item.temperatura.replace('°C', '')), 0) / group.length;
                    }),
                    borderColor: '#ff5733',
                    fill: false,
                }]
            };

            const rainData = {
                labels: Object.keys(groupedData),
                datasets: [{
                    label: 'Lluvias (mm)',
                    data: Object.values(groupedData).map(group => {
                        return group.reduce((sum, item) => sum + parseFloat(item.lluvia_de_hoy.replace(' mm', '')), 0);
                    }),
                    borderColor: '#3498db',
                    fill: false,
                }]
            };

            // Crear los gráficos nuevos
            tempChartInstance = new Chart(ctxTemp, {
                type: 'line',
                data: tempData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });

            rainChartInstance = new Chart(ctxRain, {
                type: 'line',
                data: rainData,
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true,
                        },
                    },
                },
            });
        }


        // Cargar los datos iniciales
        fetchWeatherData();

        // Cambiar el rango de tiempo
        document.getElementById('timeRange').addEventListener('change', function () {
            fetchWeatherData();
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>