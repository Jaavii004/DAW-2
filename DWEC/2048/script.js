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
            i = 16; // Break out of the loop
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
    // Move numbers down
    for (let i = 15; i >= 0; i--) {
        if (arraynum[i] === "") {
            for (let j = i - 4; j >= 0; j -= 4) {
                if (arraynum[j] !== "") {
                    // Move number down to current cell
                    arraynum[i] = arraynum[j];
                    // Empty the original cell
                    arraynum[j] = "";
                }
            }
        }
    }

    // Combine numbers
    for (let i = 15; i >= 4; i--) {
        if (arraynum[i] !== "" && arraynum[i] === arraynum[i - 4]) {
            arraynum[i] *= 2; // Double the value
            arraynum[i - 4] = ""; // Empty the upper cell
        }
    }

    // Move again to fill empty spaces
    for (let i = 15; i >= 0; i--) {
        if (arraynum[i] === "") {
            for (let j = i - 4; j >= 0; j -= 4) {
                if (arraynum[j] !== "") {
                    arraynum[i] = arraynum[j];
                    arraynum[j] = "";
                    break; // Exit the loop
                }
            }
        }
    }
}


function moverIzq() {
    
}

// Aprendido con cristian https://gitlab.com/jaavii_04/lighting-designer/-/blob/main/public/js/key-bindings.js?ref_type=heads
document.addEventListener('keydown', function(event) {
    if (event.key === 'ArrowDown') {
        // funcion que baja los numeros
        moverBajo();
        // añade un nuevo numero para seguir jugando
        if (!añadirNumeroNuevo()) {
            // vamos a mostrar un mensaje de que has perdido
            mostrarModal();
        }
    } else if (event.key === 'ArrowUp') {
        añadirNumeroNuevo();
    } else if (event.key === 'ArrowLeft') {
        // funcion que baja los numeros
        moverIzq();
        // añade un nuevo numero para seguir jugando
        if (!añadirNumeroNuevo()) {
            // vamos a mostrar un mensaje de que has perdido
            mostrarModal();
        }
    } else if (event.key === 'ArrowRight') {
        añadirNumeroNuevo();
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
        console.log(arraynum[i]);
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

mostrarJuegoPorConsola();
mostrarTablero();