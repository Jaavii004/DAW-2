<?php

/**
 * @Author: Javier Puertas
 */

if (isset($_GET["nombre"])) {
    echo "<h1>Datos recibidos:</h1>";
    // Utilizamos mb_strtoupper para convertir a mayúsculas y que los caracteres especiales se muestren correctamente
    echo "<p><strong>Nombre:</strong> " . mb_strtoupper($_GET["nombre"], 'UTF-8') . "</p>";
    echo "<p><strong>Apellidos:</strong> " . mb_strtoupper($_GET["apellidos"], 'UTF-8') . "</p>";
    echo "<p><strong>Correo electrónico:</strong> " . mb_strtoupper($_GET["email"], 'UTF-8') . "</p>";
    echo "<p><strong>Usuario:</strong> " . mb_strtoupper($_GET["usuario"], 'UTF-8') . "</p>";
    echo "<p><strong>Password:</strong> " . mb_strtoupper($_GET["password"], 'UTF-8') . "</p>";
    echo "<p><strong>Sexo:</strong> " . mb_strtoupper($_GET["sexo"], 'UTF-8') . "</p>";
    echo "<p><strong>Provincia:</strong> " . mb_strtoupper($_GET["provincia"], 'UTF-8') . "</p>";

    if (isset($_GET["horario"])) {
        echo "<p><strong>Horario de contacto:</strong> " . mb_strtoupper(implode(", ", $_GET["horario"]), 'UTF-8') . "</p>";
    } else {
        echo "<p><strong>Horario de contacto:</strong> No especificado</p>";
    }

    if (isset($_GET["conocido"])) {
        echo "<p><strong>¿Cómo nos ha conocido?:</strong> " . mb_strtoupper(implode(", ", $_GET["conocido"]), 'UTF-8') . "</p>";
    } else {
        echo "<p><strong>¿Cómo nos ha conocido?:</strong> No especificado</p>";
    }

    echo "<p><strong>Tipo de incidencia:</strong> " . mb_strtoupper($_GET["tipo-incidencia"], 'UTF-8') . "</p>";
    echo "<p><strong>Descripción de la incidencia:</strong> " . mb_strtoupper($_GET["descripcion"], 'UTF-8') . "</p>";
} else {
?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Javier Puertas - Formulario de registro 4</title>
    </head>

    <body>
        <h1>Javier Puertas - Formulario de registro 4</h1>

        <form action="4formulario.php" method="GET">
            <fieldset>
                <legend>Datos Personales</legend>
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" maxlength="50" placeholder="Introduce tu nombre" required><br><br>

                <label for="apellidos">Apellidos:</label>
                <input type="text" name="apellidos" maxlength="200" placeholder="Introduce tus apellidos" required><br><br>

                <label for="email">Correo electrónico:</label>
                <input type="text" name="email" maxlength="250" placeholder="Introduce tu correo" required><br><br>

                <label for="usuario">Usuario:</label>
                <input type="text" name="usuario" maxlength="5" placeholder="Usuario" required><br><br>

                <label for="password">Password:</label>
                <input type="password" name="password" maxlength="15" placeholder="Introduce tu contraseña" required><br><br>

                <label>Sexo:</label>
                <input type="radio" name="sexo" value="Hombre" checked>
                <label for="hombre">Hombre</label>
                <input type="radio" name="sexo" value="Mujer">
                <label for="mujer">Mujer</label><br><br>
            </fieldset>

            <fieldset>
                <legend>Datos de contacto</legend>
                <label for="provincia">Provincia:</label>
                <select name="provincia" required>
                    <option value="Alicante">Alicante</option>
                    <option value="Castellón">Castellón</option>
                    <option value="Valencia">Valencia</option>
                </select><br><br>

                <label for="horario">Horario de contacto:</label>
                <select name="horario[]" multiple size="3">
                    <option value="De 8 a 14 horas">De 8 a 14 horas</option>
                    <option value="De 14 a 18 horas">De 14 a 18 horas</option>
                    <option value="De 18 a 21 horas">De 18 a 21 horas</option>
                </select><br><br>

                <label>¿Cómo nos ha conocido?</label><br>
                <input type="checkbox" name="conocido[]" value="Un amigo">
                <label for="amigo">Un amigo</label>
                <input type="checkbox" name="conocido[]" value="Web">
                <label for="web">Web</label>
                <input type="checkbox" name="conocido[]" value="Prensa">
                <label for="prensa">Prensa</label>
                <input type="checkbox" name="conocido[]" value="Otros">
                <label for="otros">Otros</label><br><br>
            </fieldset>


            <fieldset>
                <legend>Datos de la incidencia</legend>
                <label for="tipo-incidencia">Tipo de incidencia:</label>
                <select name="tipo-incidencia" required>
                    <option value="Teléfono fijo">Teléfono fijo</option>
                    <option value="Teléfono móvil">Teléfono móvil</option>
                    <option value="Internet">Internet</option>
                    <option value="Televisión">Televisión</option>
                </select><br><br>

                <p>Datos de la incidencia:</p>
                <label for="descripcion">Tipo:</label>
                <textarea name="descripcion" rows="4" cols="40" placeholder="Describa la incidencia..."
                    required></textarea><br><br>

            </fieldset>

            <fieldset>
                <button type="submit">Enviar</button>
                <button type="reset">Resetear</button>
            </fieldset>
        </form>

    </body>

    </html>
<?php
}
?>