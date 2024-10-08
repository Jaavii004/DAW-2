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
    document.getElementById("cel" + numeroRandom).innerText = 2;
}

console.log(arraynum);


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
        console.log(arraynum);
        return false;
    }
    
    let numeroRandom;
    do {
        numeroRandom = Math.floor(Math.random() * 16) + 1;
    } while (arraynum[numeroRandom] !== "");

    arraynum[numeroRandom] = 2;
    document.getElementById("cel" + numeroRandom).innerText = 2;
    return true;
}


function moverBajo() {

}


// Aprendido con cristian https://gitlab.com/jaavii_04/lighting-designer/-/blob/main/public/js/key-bindings.js?ref_type=heads
document.addEventListener('keydown', function(event) {
    if (event.key === 'ArrowDown') {
        añadirNumeroNuevo();
    } else if (event.key === 'ArrowUp') {
        añadirNumeroNuevo();
    } else if (event.key === 'ArrowLeft') {
        añadirNumeroNuevo();
    } else if (event.key === 'ArrowRight') {
        añadirNumeroNuevo();
    }
});


function mostrarJuego() {
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

mostrarJuego();
