// Obtener el cuadrado de un número
function cuadrado(numero) {
    return numero*numero;
}

// Función que comprueba si es feliz un número o no.
function esNumeroFeliz(numeroAcomprobar) {
    // Lo pasamos a string, ya que para separar un número como, por ejemplo, 45, como 4 5 necesitamos que sea un string.
    numeroAcomprobar = numeroAcomprobar.toString();
    for (let index = 0; index < 8; index++) {
        numeroAC_Array = numeroAcomprobar.split("");
        // Inicializamos el resultado que será la suma de todos los números a 0.
        let sumaTot = 0;
        for (let j = 0; j < numeroAC_Array.length; j++) {
            sumaTot+=cuadrado(parseInt(numeroAC_Array[j]));
        }
        // si es = a 1 devolvemos verdadero como que es feliz.
        if (sumaTot == 1) {
            return true;
        }
        // Si aún no es feliz, seguimos comprobando para pasarlo a string.
        numeroAcomprobar = sumaTot.toString();
    }
    // Si después de todos los intentos no es feliz, devolvemos que no es feliz con false
    return false;
}

// Función con la que iniciaremos para cambiar todos los campos.
function NumeroInicial() {
    // Ponemos el texto "Defaul"
    document.getElementById("columna-izquierda").innerHTML = "Número Feliz";
    document.getElementById("columna-derecha").innerHTML = "Cantidad de números infelices (hasta encontrarlo)";
    // Definimos variables iniciales.
    let numeroCantidadIntentos = document.getElementById("numero-cantidad").value;
    let numEnc = 0;
    let numeroInicial = document.getElementById("numero-inicial").value;
    let numerosAmostrar = [];
    // Sacamos error ya que no podemos obtener la cantidad ni negativa ni 0.
    if (numeroCantidadIntentos <= 0) {
        alert("No te puedo mostrar 0 ni negativo pon mas");
        return;
    }
    if (numeroInicial <= 0) {
        alert("No puede ser negativo el inicial");
        return;
    }
    
    // Vamos a comprobar con un while hasta que se llegue a la cantidad puesta por el cliente.
    while (numeroCantidadIntentos != numEnc) {
        if (esNumeroFeliz(numeroInicial)) {
            // Si encontramos uno feliz, sumamos un número a los encontrados y lo añadimos al array para mostrarlo más tarde.
            numEnc++;
            numerosAmostrar.push(numeroInicial);
        }
        // Tanto si es feliz como si no sumamos uno para sí, hay que seguir comprobando.
        numeroInicial++;
    }
    // Llamamos a la función para mostrar los números bonitos por pantalla con sus diferencias.
    MostrarNumerosBonitos(numerosAmostrar)
    
}

// función que muestra los números de manera bonita obtenidos desde un array
function MostrarNumerosBonitos(numerosAmostrar) {
    let numerosDerecha = document.getElementById("columna-derecha");
    let numerosIzquierda =document.getElementById("columna-izquierda")
    let num = document.getElementById("numero-inicial").value;
    for (let i = 0; i < numerosAmostrar.length; i++) {
        let divnu = document.createElement("div");
        divnu.textContent = numerosAmostrar[i];
        divnu.className = "numero numeroAmarillo";
        // Le pasamos en una función que cuando hagan click pondrá el clickado.
        divnu.onclick = function(){
            CambiarClickado(numerosAmostrar[i]);
        };
        numerosIzquierda.appendChild(divnu);

        let res = numerosAmostrar[i] - num;
        // Sumamos uno a la diferencia, ya que de 1 a 7 no hay 6 hay 5
        num = parseInt(numerosAmostrar[i])+1;
        // Mostramos a la derecha los números de la diferencia.
        let divnuD = document.createElement("div");
        divnuD.textContent = res;
        divnuD.className = "numero";
        numerosDerecha.appendChild(divnuD);
    }
}

// función que cambia el número clickado al cuadrado de número clickado.
function CambiarClickado(num) {
    let divClick = document.getElementById("numero-Clickado");
    divClick.innerText = num;
}

// Empezamos ejecutando con el valor por defecto que tenemos.
NumeroInicial(document.getElementById("numero-inicial").value);