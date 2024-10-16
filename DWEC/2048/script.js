let arraynum = [];

for (let index = 0; index < 16; index++) {
    arraynum[index] = "";
}

for (let index = 0; index < 2; index++) {
    let numeroRandom;
    do {
        numeroRandom = Math.floor(Math.random() * 16);
    } while (arraynum[numeroRandom] !== "");
    
    arraynum[numeroRandom] = 2;
}

function añadirNumeroNuevo() {
    let lleno = true;
    let i = 1;

    while (i < 16) {
        if (arraynum[i] === "") {
            lleno = false;
            i = 16;
        }
        i++;
    }

    if (lleno) {
        console.log("Está lleno, perdiste");
        return false;
    }

    let numeroRandom;
    do {
        numeroRandom = Math.floor(Math.random() * 16);
    } while (arraynum[numeroRandom] !== "");

    arraynum[numeroRandom] = 2;

    mostrarTablero();
    mostrarJuegoPorConsola();
    return true;
}
function moverBajo() {
    // Recorre cada columna (de 0 a 3)
    for (let col = 0; col < 4; col++) {
        // array temporal
        let temporal = []; 

        // Recorre cada fila de la columna de abajo hacia arriba (de 3 a 0)
        for (let fila = 3; fila >= 0; fila--) {
            // Si el valor de la posición actual no está vacío
            if (arraynum[fila * 4 + col] !== "") {
                // Agrega el valor al array temporal
                temporal.push(arraynum[fila * 4 + col]); 
            }
        }

        // Combina los números adyacentes en el array temporal
        for (let i = 0; i < temporal.length; i++) {
            // Si el número actual es igual al siguiente
            if (temporal[i] === temporal[i + 1]) {
                // Multiplica el número actual por 2
                temporal[i] *= 2; 
                // Elimina el siguiente número ya combinado
                temporal.splice(i + 1, 1); 
            }
        }

        // Rellena la columna original en el array 'arraynum' desde abajo hacia arriba
        for (let i = 0; i < 4; i++) {
            // Si hay elementos en el array temporal, coloca el valor en la posición correspondiente
            if (i < temporal.length) {
                // Asigna el valor a la posición
                arraynum[(3 - i) * 4 + col] = temporal[i]; 
            } else {
                // Si no hay más elementos, coloca un string vacío
                arraynum[(3 - i) * 4 + col] = ""; 
            }
        }
    }
}

function moverArriba() {
    for (let col = 0; col < 4; col++) {
        let temp = [];
        for (let row = 0; row < 4; row++) {
            if (arraynum[row * 4 + col] !== "") {
                temp.push(arraynum[row * 4 + col]);
            }
        }

        for (let i = 0; i < temp.length; i++) {
            if (temp[i] === temp[i + 1]) {
                temp[i] *= 2;
                temp.splice(i + 1, 1);
            }
        }

        for (let i = 0; i < 4; i++) {
            if (i < temp.length) {
                arraynum[i * 4 + col] = temp[i];
            } else {
                arraynum[i * 4 + col] = "";
            }
        }
    }
}

function moverIzq() {
    for (let row = 0; row < 4; row++) {
        let temp = [];
        for (let col = 0; col < 4; col++) {
            if (arraynum[row * 4 + col] !== "") {
                temp.push(arraynum[row * 4 + col]);
            }
        }

        for (let i = 0; i < temp.length; i++) {
            if (temp[i] === temp[i + 1]) {
                temp[i] *= 2;
                temp.splice(i + 1, 1);
            }
        }

        for (let col = 0; col < 4; col++) {
            if (col < temp.length) {
                arraynum[row * 4 + col] = temp[col];
            } else {
                arraynum[row * 4 + col] = "";
            }
        }
    }
}

function moverDerecha() {
    for (let row = 0; row < 4; row++) {
        let temp = [];
        for (let col = 3; col >= 0; col--) {
            if (arraynum[row * 4 + col] !== "") {
                temp.push(arraynum[row * 4 + col]);
            }
        }

        for (let i = 0; i < temp.length; i++) {
            if (temp[i] === temp[i + 1]) {
                temp[i] *= 2;
                temp.splice(i + 1, 1);
            }
        }

        for (let col = 0; col < 4; col++) {
            if (col < temp.length) {
                arraynum[row * 4 + (3 - col)] = temp[col];
            } else {
                arraynum[row * 4 + (3 - col)] = "";
            }
        }
    }
}

// Aprendido con cristian https://gitlab.com/jaavii_04/lighting-designer/-/blob/main/public/js/key-bindings.js?ref_type=heads
document.addEventListener('keydown', function(event) {
    if (event.key === 'ArrowDown') {
        arrayUndo = [...arraynum];
        // funcion que baja los numeros
        moverBajo();
        // añade un nuevo numero para seguir jugando
        if (!añadirNumeroNuevo()) {
            // vamos a mostrar un mensaje de que has perdido
            mostrarModal();
        }
    } else if (event.key === 'ArrowUp') {
        arrayUndo = [...arraynum];
        // funcion que mueve los numeros a la izquierda
        moverArriba();
        // añade un nuevo numero para seguir jugando
        if (!añadirNumeroNuevo()) {
            // vamos a mostrar un mensaje de que has perdido
            mostrarModal();
        }
    } else if (event.key === 'ArrowLeft') {
        arrayUndo = [...arraynum];

        // funcion que mueve los numeros a la izquierda
        moverIzq();
        // añade un nuevo numero para seguir jugando
        if (!añadirNumeroNuevo()) {
            // vamos a mostrar un mensaje de que has perdido
            mostrarModal();
        }
    } else if (event.key === 'ArrowRight') {
        arrayUndo = [...arraynum];

        // funcion que mueve los numeros a la izquierda
        moverDerecha();
        // añade un nuevo numero para seguir jugando
        if (!añadirNumeroNuevo()) {
            // vamos a mostrar un mensaje de que has perdido
            mostrarModal();
        }
    }
});

function mostrarModal() {
    const modal = document.getElementById("modal");
    modal.style.display = "block";
}

document.getElementById("restartButton").onclick = function() {
    location.reload();
};

function mostrarTablero() {
    let suma = 0;
    for (let i = 0; i < arraynum.length; i++) {
        document.getElementById("cel" + i).innerText = arraynum[i];
        document.getElementById("cel" + i).dataset.value = arraynum[i];
        if (arraynum[i] !== "") {
            suma += parseInt(arraynum[i]);
        }
    }
    document.getElementById("score").innerText = suma;
}

function mostrarJuegoPorConsola() {
    let firstFour = "";
    let column = 1;
    for (let i = 0; i < 16; i++) {
        firstFour += `|${arraynum[i] === "" ? "*" : arraynum[i]}`;
        if (i % 4 === 3) {
            console.log("{" + column + "}" + firstFour);
            column++;
            firstFour = "";
        }
    }
    console.log("--------------------");
}

function volverAtras() {
    arraynum = [...arrayUndo];
    mostrarTablero();
}

document.getElementById("volver-atras").onclick = function() {
    volverAtras();
};

let arrayUndo = [...arraynum];
mostrarJuegoPorConsola();
mostrarTablero();