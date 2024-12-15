<?php

/**
 * @Author: Javier Puertas
 */

$myarrayAsociativo = array();

$myarrayAsociativo["nombre"] = "Javier";
$myarrayAsociativo["apellido"] = "Puertas";
$myarrayAsociativo["edad"] = 20;

echo $myarrayAsociativo["nombre"]." ".$myarrayAsociativo["apellido"]." ".$myarrayAsociativo["edad"];

exit;

$var = 1;
$var2 = 2;
$var3 = 3;

echo $var + $var2 + $var3;

$myarray = array();
for ($i=0; $i < 3; $i++) { 
    $myarray[$i] = $i;
    echo " ".$myarray[$i];
}
echo "<br>";

foreach ($myarray as $valor) {
    echo " ".$valor;
}


print_r($myarray);
$ultimoValorQuitado = array_pop($myarray);
echo "<br>";
echo "Ultimo valor quitado: ".$ultimoValorQuitado;
echo "<br>";
switch ($var) {
    case 1:
        echo "1";
        break;
    
    default:
        echo "default";
        break;
}

?>