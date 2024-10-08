function añadirPantalla(elemento) {
    let pantalla = document.getElementById("pantalla");
    if (pantalla.value == "Error") {
        pantalla.value = "";
    }
    if (elemento.innerText == "()") {
        pantalla.value = "(" +  pantalla.value + ")";
    } else {
        if (pantalla.value == 0) {
            pantalla.value = elemento.innerText;
        } else {
            pantalla.value += elemento.innerText;
        }
    }
}

function eliminar_ultimo() {
    let pantalla = document.getElementById("pantalla");
    pantalla.value = pantalla.value.slice(0, -1);
}

function limpìar_pantalla() {
    const pantalla = document.getElementById("pantalla");
    pantalla.value = "0";
}

function calcular() {
    const pantalla = document.getElementById("pantalla");
    try {
        pantalla.value = eval(pantalla.value.replace(/x/g, '*')).toFixed(2);
        if (pantalla.value == "Infinity") {
            pantalla.value = "Error";
        }
    } catch (error) {
        pantalla.value = "Error";
    }
}

// Aprendido con cristian https://gitlab.com/jaavii_04/lighting-designer/-/blob/main/public/js/key-bindings.js?ref_type=heads
document.addEventListener('keydown', function(event) {
    if (event.key === 'Enter') {
        event.preventDefault();
        calcular();
    } else if (event.key === 'Escape' || event.key.toLowerCase() === 'c') {
        event.preventDefault();
        limpìar_pantalla();
    }
});