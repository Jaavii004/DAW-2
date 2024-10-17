<?php

/**
 * @Author: Javier Puertas
 */


 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="GET">
    <h1>Alumnos - Formulario de registro 3</h1>
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" maxlength="50" required><br>

    <label for="apellidos">Apellidos:</label>
    <input type="text" id="apellidos" name="apellidos" maxlength="200" required><br>

    <label for="email">Correo electrónico:</label>
    <input type="text" id="email" name="email" maxlength="250" required><br>

    <label for="usuario">Usuario:</label>
    <input type="text" id="usuario" name="usuario" maxlength="5" required><br>

    <label for="password">Password:</label>
    <input type="password" id="password" name="password" maxlength="15" required><br>

    <label for="sexo">Sexo:</label>
    <input type="radio" id="hombre" name="sexo" value="hombre" required>
    <label for="hombre">Hombre</label>
    <input type="radio" id="mujer" name="sexo" value="mujer" required>
    <label for="mujer">Mujer</label><br>

    <label for="provincia">Provincia:</label>
    <select id="provincia" name="provincia" required>
        <option value="Alicante">Alicante</option>
        <option value="Castellón">Castellón</option>
        <option value="Valencia">Valencia</option>
    </select><br>

    <label for="horario">Horario de contacto:</label>
    <select id="horario" name="horario[]" multiple required>
        <option value="8-14">De 8 a 14 horas</option>
        <option value="14-18">De 14 a 18 horas</option>
        <option value="18-21">De 18 a 21 horas</option>
    </select><br>

    <label for="conocido">¿Cómo nos ha conocido?</label><br>
    <input type="checkbox" id="amigo" name="conocido[]" value="amigo">
    <label for="amigo">Un amigo</label><br>
    <input type="checkbox" id="web" name="conocido[]" value="web">
    <label for="web">Web</label><br>
    <input type="checkbox" id="prensa" name="conocido[]" value="prensa">
    <label for="prensa">Prensa</label><br>
    <input type="checkbox" id="otros" name="conocido[]" value="otros">
    <label for="otros">Otros</label><br>

    <label for="comentario">Comentario:</label><br>
    <textarea id="comentario" name="comentario" rows="6" cols="60"></textarea><br>

    <input type="checkbox" id="informacion" name="informacion" value="si" checked>
    <label for="informacion">Deseo recibir información sobre novedades y ofertas</label><br>

    <input type="checkbox" id="condiciones" name="condiciones" required>
    <label for="condiciones">Declaro haber leído y aceptar las condiciones generales del programa y la normativa sobre protección de datos</label><br>

    <input type="submit" value="Enviar">
    <input type="reset" value="Limpiar">
</form>
