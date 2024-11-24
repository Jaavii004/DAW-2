let puntosParaGanar = 10;
let puntosJugador = 0;
let puntosMaquina = 0;

const mensajes = {
    tipa: "Tijeras cortan papel",
    papi: "Papel tapa piedra",
    pila: "Piedra aplasta lagarto",
    lasp: "Lagarto envenena a Spock",
    spti: "Spock rompe tijeras",
    tila: "Tijeras decapitan lagarto",
    lapa: "Lagarto devora papel",
    pasp: "Papel desautoriza a Spock",
    sppi: "Spock vaporiza piedra",
    piti: "Piedra aplasta tijeras"
};

// Cuando la página esté lista
window.onload = () => {
    asignarEventos();
};

// Función para asignar los eventos
function asignarEventos() {
    // Eventos drag-and-drop
    const areaSeleccionada = document.getElementById("seleccionado");

    document.querySelectorAll(".item img").forEach((item) => {
        item.addEventListener("dragstart", dragStart);
    });

    areaSeleccionada.addEventListener("dragover", dragOver);
    areaSeleccionada.addEventListener("drop", drop);

    // Evento para el botón "Continuar"
    document.getElementById("continuar").addEventListener("click", continuar);
}

// Funciones de drag-and-drop
function dragStart(event) {
    event.dataTransfer.setData("text/plain", event.target.id);
}

function dragOver(event) {
    event.preventDefault();
}

function drop(event) {
    event.preventDefault();
    const id = event.dataTransfer.getData("text/plain");
    const elemento = document.getElementById(id);
    const areaSeleccionada = document.getElementById("seleccionado");

    // Limpiar el área y añadir el nuevo elemento seleccionado
    areaSeleccionada.innerHTML = "";
    const nuevoElemento = elemento.cloneNode(true);
    nuevoElemento.removeAttribute("draggable");
    areaSeleccionada.appendChild(nuevoElemento);

    // Jugar la ronda
    jugarRonda(id);
}

function jugarRonda(eleccionJugador) {
    const opciones = ["piedra", "papel", "tijera", "lagarto", "spock"];
    const eleccionMaquina = opciones[Math.floor(Math.random() * opciones.length)];

    let resultado = "maquina";
    if (eleccionJugador === eleccionMaquina) {
        resultado = "empate";
    } else if (
        (eleccionJugador === "tijera" && (eleccionMaquina === "papel" || eleccionMaquina === "lagarto")) ||
        (eleccionJugador === "papel" && (eleccionMaquina === "piedra" || eleccionMaquina === "spock")) ||
        (eleccionJugador === "piedra" && (eleccionMaquina === "tijera" || eleccionMaquina === "lagarto")) ||
        (eleccionJugador === "lagarto" && (eleccionMaquina === "spock" || eleccionMaquina === "papel")) ||
        (eleccionJugador === "spock" && (eleccionMaquina === "tijera" || eleccionMaquina === "piedra"))
    ) {
        resultado = "jugador";
    }

    if (resultado === "empate") {
        resultado = "¡Es un empate!";
    } else if (resultado === "jugador") {
        resultado = `¡Ganaste! ${mensajes[eleccionJugador.substring(0, 2) + eleccionMaquina.substring(0, 2)]}`;
        puntosJugador++;
    } else {
        resultado = `¡Perdiste! ${mensajes[eleccionMaquina.substring(0, 2) + eleccionJugador.substring(0, 2)]}`;
        puntosMaquina++;
    }

    mostrarMensaje(resultado);
}

// Mostrar el mensaje del resultado
function mostrarMensaje( resultado) {
    const mensaje = document.getElementById("mensaje");
    const texto = mensaje.querySelector("p");

    texto.textContent = resultado;

    mensaje.className = "visible";
    document.getElementById("proteccion").className = "visible";
}

// Reiniciar la partida
function continuar() {
    const jugadorDiv = document.getElementById("jugador");
    const maquinaDiv = document.getElementById("maquina");

    document.getElementById("mensaje").className = "invisible";
    const jugadorPorcentaje = (puntosJugador / puntosParaGanar) * 100;
    const maquinaPorcentaje = (puntosMaquina / puntosParaGanar) * 100;

    jugadorDiv.style.background = `linear-gradient(to bottom, blue ${jugadorPorcentaje}%, transparent ${jugadorPorcentaje}%)`;
    maquinaDiv.style.background = `linear-gradient(to bottom, red ${maquinaPorcentaje}%, transparent ${maquinaPorcentaje}%)`;
    document.getElementById("proteccion").className = "invisible";

    document.getElementById("seleccionado").innerHTML = "";
}