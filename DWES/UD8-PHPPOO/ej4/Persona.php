<?php

/**
 * @Author: Javier Puertas
 */

class Persona {
    // Atributos
    private $nombre;
    private $edad;
    private $DNI;
    private $sexo;
    private $peso;
    private $altura;

    // Constantes de clase
    const INFRAPESO = -1;
    const PESO_IDEAL = 0;
    const SOBREPESO = 1;

    // Constructor por defecto
    public function __construct($nombre = "", $edad = 0, $sexo = 'H', $peso = 0, $altura = 0) {
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->sexo = $this->comprobarSexo($sexo);
        $this->peso = $peso;
        $this->altura = $altura;
        $this->DNI = $this->generarDNI();
    }

    // Constructor con nombre, edad y sexo
    public static function consNomEdSex($nombre, $edad, $sexo) {
        $obj = new self($nombre, $edad, $sexo);
        return $obj;
    }

    // Constructor con todos los atributos
    public static function consFull($nombre, $edad, $sexo, $peso, $altura) {
        $obj = new self($nombre, $edad, $sexo, $peso, $altura);
        return $obj;
    }

    // Método para generar el DNI
    private function generarDNI() {
        $numero = rand(10000000, 99999999);
        $letra = $this->generaLetraDNI($numero % 23);
        return $numero . $letra;
    }

    // Método para generar la letra del DNI
    private function generaLetraDNI($idLetra) {
        $letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
        return $letras[$idLetra];
    }

    // Métodos getter y setter
    public function getNombre() {
        return $this->nombre;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function getDNI() {
        return $this->DNI;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function setPeso($peso) {
        $this->peso = $peso;
    }

    public function getPeso() {
        return $this->peso;
    }

    public function setAltura($altura) {
        $this->altura = $altura;
    }

    public function getAltura() {
        return $this->altura;
    }

    // Método privado para comprobar el sexo
    private function comprobarSexo($sexo = "M") {
        return $sexo;
    }

    // Método para calcular el IMC
    public function calcularIMC() {
        if ($this->altura == 0) return 0; // Evitar división por cero
        $imc = $this->peso / ($this->altura * $this->altura); // Fórmula del IMC
        if ($imc < 20) {
            return self::INFRAPESO; // Si el IMC es menor a 20, está por debajo de su peso ideal
        } elseif ($imc <= 25) {
            return self::PESO_IDEAL; // Si el IMC está entre 20 y 25, está en su peso ideal
        } else {
            return self::SOBREPESO; // Si el IMC es mayor a 25, tiene sobrepeso
        }
    }

    // Método para obtener el resultado del IMC como cadena
    public function strIMC() {
        switch ($this->calcularIMC()) {
            case self::INFRAPESO:
                return $this->nombre . " está por debajo de su peso ideal.";
            case self::PESO_IDEAL:
                return $this->nombre . " está en su peso ideal.";
            case self::SOBREPESO:
                return $this->nombre . " tiene sobrepeso.";
        }
    }

    // Método para mostrar el IMC
    public function mostrarIMC() {
        return $this->strIMC(); // Devuelve el mensaje del estado del IMC
    }

    // Método para saber si es mayor de edad
    public function esMayorDeEdad() {
        return $this->edad >= 18;
    }

    // Método mágico __toString() para imprimir la información
    public function __toString() {
        return "Información de la persona:<br>DNI: " . $this->DNI . "<br>Nombre: " . $this->nombre . "<br>Sexo: " . ($this->sexo == 'H' ? 'Hombre' : 'Mujer') . "<br>Edad: " . $this->edad . "<br>Peso: " . $this->peso . " Kg<br>Altura: " . $this->altura . " metros<br>Resultado IMC: " . $this->mostrarIMC();
    }
}
?>
