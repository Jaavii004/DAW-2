let arraynum = [];


for (let index = 1; index <= 16; index++) {
    arraynum[index] = "";
}


for (let index = 0; index < 2; index++) {
    let numeroRandom;
    do {
        numeroRandom = Math.floor(Math.random() * 16) + 1;
    } while (arraynum[numeroRandom] !== "");
    
    arraynum[numeroRandom] = 2;
}

function añadirNumeroNuevo() {
    let lleno = true;
    let i = 1;
    while (i <= 16) {
        if (arraynum[i] === "") {
            lleno = false;
            i = 17;
        }
        i++;
    }
    if (lleno) {
        console.log("Esta lleno perdiste");
        return false;
    }
    
    let numeroRandom;
    do {
        numeroRandom = Math.floor(Math.random() * 16) + 1;
    } while (arraynum[numeroRandom] !== "");

    arraynum[numeroRandom] = 2;
    return true;
}


function moverBajo() {
    // Recorre el array desde el final hasta el principio
    for (let i = arraynum.length - 1; i >= 1; i--) {
        // Si la celda actual está vacía
        if (arraynum[i] == "") {
            // Recorre la columna por encima de la celda actual
            for (let j = i - 4; j >= 1; j -= 4) {
                // Si se encuentra una celda no vacía
                if (arraynum[j] !== "") {
                    // Mueve el número hacia abajo a la celda actual
                    arraynum[i] = arraynum[j];
                    // Vacía la celda original
                    arraynum[j] = "";
                }
            }
        }
    }
}


// Aprendido con cristian https://gitlab.com/jaavii_04/lighting-designer/-/blob/main/public/js/key-bindings.js?ref_type=heads
document.addEventListener('keydown', function(event) {
    if (event.key === 'ArrowDown') {
        // funcion que baja los numeros
        moverBajo();
        // añade un nuevo numero para seguir jugando
        if (!añadirNumeroNuevo()) {
            // vamos a mostrar un mensaje de que has perdido
            alert("Has perdido");

        }
        // mostramos el tablero y por consola
        mostrarTablero();
        mostrarJuegoPorConsola();
    } else if (event.key === 'ArrowUp') {
        añadirNumeroNuevo();
    } else if (event.key === 'ArrowLeft') {
        añadirNumeroNuevo();
    } else if (event.key === 'ArrowRight') {
        añadirNumeroNuevo();
    }
});

function mostrarTablero() {
    suma = 0;
    for (let i = 1; i < arraynum.length; i++) {
        console.log(arraynum[i]);
        document.getElementById("cel" + i).innerText = arraynum[i];
        document.getElementById("cel" + i).dataset.value = arraynum[i];
        if (arraynum[i] != "") {
            suma += parseInt(arraynum[i]);
        }
    }
    document.getElementById("score").innerText = suma;
}


function mostrarJuegoPorConsola() {
    let firstFour = "";
    let column = 1;
    for (let i = 1; i <= 16; i++) {
        firstFour += `|${arraynum[i] === "" ? "*" : arraynum[i]}`;
        if (i % 4 === 0) {
            console.log("{"+ column +"}"+ firstFour);
            column +=1;
            firstFour = "";
        }
    }
    console.log("--------------------");
}

mostrarJuegoPorConsola();
mostrarTablero();