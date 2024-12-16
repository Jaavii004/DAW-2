<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {


    //Recogemos los datos de Checkbox
    $colores = $_POST["colores"];
    //creamos una url para pasar los datos
    $urlcolores = json_encode($colores);

    //Recogemos los datos de Select Multiple
    $idiomas = $_POST["idiomas"];
    //creamos una url para pasar los datos
    $urlidiomas = implode("+", $idiomas); //El + se traduce en espacios en la url
    $urlidiomas1 = implode("*", $idiomas);

    if ($_POST['enviar'] === 'Enviar') {
        header('Location: VectoresURL_OK.php?colores=' . $urlcolores . "&idiomas=" . $urlidiomas . "&idiomas1=" . $urlidiomas1);
        exit;
    }
}
?>

<html>

<body>
    <form action="VectoresURL.php" method="POST">
        Rojo<input type="checkbox" name="colores[]" value="rojo" />
        Azul<input type="checkbox" name="colores[]" value="azul" />
        Morado<input type="checkbox" name="colores[]" value="morado" />
        Amarillo<input type="checkbox" name="colores[]" value="amarillo" />
        Verde<input type="checkbox" name="colores[]" value="verde" /></br>
        <p>
            <select multiple name="idiomas[]" size="3">
                <option value="Castellano">Castellano</option>
                <option value="Valenciano">Valenciano</option>
                <option value="Inglés">Inglés</option>
                <option value="Italiano">Italiano</option>

            </select>
        </p>
        <input type="submit" name="enviar" value="Enviar" />

    </form>

</body>

</html>