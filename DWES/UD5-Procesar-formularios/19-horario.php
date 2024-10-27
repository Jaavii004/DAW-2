<?php
/**
 * @Author: Javier Puertas
 */

// 19. Crea un programa donde se le seleccione el curso (radiobutton), los módulos (a seleccionar de
// un desplegable) y las horas (marcar o desmarcar) y genere un horario usando una tabla.
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generador de Horario</title>
</head>

<body>
    <h1>Generador de Horario</h1>
    <form method="post" action="">
        <h2>Selecciona el curso:</h2>
        <input type="radio" name="curso" value="1º ESO" required>
        <label>1º ESO</label><br>
        <input type="radio" name="curso" value="2º ESO" required>
        <label>2º ESO</label><br>
        <input type="radio" name="curso" value="3º ESO" required>
        <label>3º ESO</label><br>
        <input type="radio" name="curso" value="4º ESO" required>
        <label>4º ESO</label><br><br>

        <h2>Selecciona los módulos:</h2>
        <select name="modulo" required>
            <option value="Matemáticas">Matemáticas</option>
            <option value="Lengua">Lengua</option>
            <option value="Historia">Historia</option>
            <option value="Ciencias">Ciencias</option>
            <option value="Inglés">Inglés</option>
        </select><br><br>

        <h2>Selecciona las horas:</h2>
        <input type="checkbox" name="horas[]" value="8:00 - 9:00">
        <label>8:00 - 9:00</label><br>
        <input type="checkbox" name="horas[]" value="9:00 - 10:00">
        <label>9:00 - 10:00</label><br>
        <input type="checkbox" name="horas[]" value="10:00 - 11:00">
        <label>10:00 - 11:00</label><br>
        <input type="checkbox" name="horas[]" value="11:00 - 12:00">
        <label>11:00 - 12:00</label><br>
        <input type="checkbox" name="horas[]" value="12:00 - 13:00">
        <label>12:00 - 13:00</label><br><br>

        <input type="submit" value="Generar Horario">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $curso = $_POST['curso'];
        $modulo = $_POST['modulo'];
        $horas = isset($_POST['horas']) ? $_POST['horas'] : [];

        // Mostrar el horario
        echo "<h2>Horario Generado para $curso</h2>";
        echo "<table border='1'>
                <tr>
                    <th>Hora</th>
                    <th>Módulo</th>
                </tr>";

        foreach ($horas as $hora) {
            echo "<tr>
                    <td>$hora</td>
                    <td>$modulo</td>
                  </tr>";
        }

        echo "</table>";
    }
    ?>
</body>

</html>
