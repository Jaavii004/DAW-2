<?php
// Aquí puedes incluir código PHP si necesitas mostrar algo dinámico
$mensaje = "¡Bienvenido a mi página bonita hecha con PHP!";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Bonita con PHP</title>
    <style>
        /* Aquí va el estilo CSS para que la página sea más bonita */
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            border-radius: 10px;
            padding: 40px;
            text-align: center;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            color: #4CAF50;
        }
        p {
            font-size: 18px;
            color: #555;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<div class="container">
    <h1>Página Bonita con PHP</h1>
    <p><?php echo $mensaje; ?></p>
    <a href="#" class="btn">Haz Clic Aquí</a>
</div>

</body>
</html>
