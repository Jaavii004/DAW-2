//Mensajes de los resultados de las jugadas
var mensajes = {
    tipa: "Tijeras cortan papel",
    papi: "Papel tapa piedra",
    pila:"Piedra aplasta lagarto",
    lasp: "Lagarto envenena a Spock",
    spti: "Spock rompe tijeras",
    tila: "Tijeras decapitan lagarto",
    lapa: "Lagarto devora papel",
    pasp: "Papel desautoriza a Spock",
    sppi: "Spock vaporiza piedra",
    piti: "Piedra aplasta tijeras"
}

//Variables que contendrán los elementos HTML que vayamos a necesitar

window.onload = function(){
    cargarTablero();
    asignarElementosHTML();
    cargarEventos();
}

function asignarElementosHTML() {
    //Función que utilizaremos para asignar los elementos HTML que vayamos a utilizar, a las varibales que hemos creado.
}

function cargarEventos() {
    //Función donde cargaremos los eventos que necesite cada elemento de la partida
}

function continuar() {
    //Función que lanzamos cuando pulsamos al botón continuar
    //Volvemos a ocultar el mensaje;
    document.getElementById("mensaje").className = "invisible";
    document.getElementById("proteccion").className = "invisible";
    document.getElementById("deliveracion").className = "invisible";

    //Si es una jugada reiniciamos todo menos los contadores de puntos.
    //Si es el final de la partida, también incluimos los contadores de puntos.
    cargarTablero();
}

function deliverar() {
    document.getElementById("proteccion").className="visible";
    document.getElementById("deliveracion").className="visible";
    setTimeout(mostrarMensaje,2000);
}

function mostrarMensaje() {
    //Mostramos el mensaje en función del resultado de la jugada o de la partida
}

function cargarTablero() {
    //Función donde crearemos los elementos que vayamos a necesitar, junto a sus atributos y eventos
    //La utilizaremos para reiniciar cada jugada
}

/***************************DRAG AND DROP ****************************/

//Funciones para el drag&drop

 
/***************************FIN DRAG AND DROP **************************/

// Seleccionar el área donde se mostrará el elemento seleccionado
document.addEventListener("DOMContentLoaded", () => {
    // Seleccionar el área donde se mostrará el elemento seleccionado
    const areaSeleccionada = document.getElementById("seleccionado");

    // Verifica si el elemento seleccionado existe
    if (areaSeleccionada) {
        // Añadir eventos de arrastrar y soltar a cada imagen
        document.querySelectorAll(".item img").forEach((item) => {
            item.addEventListener("dragstart", dragStart);
        });

        // Añadir los eventos de "dragover" y "drop" al área de selección
        areaSeleccionada.addEventListener("dragover", dragOver);
        areaSeleccionada.addEventListener("drop", drop);
    } else {
        console.error("El área de selección no se encontró en el DOM.");
    }

    // Función para el inicio del arrastre
    function dragStart(event) {
        event.dataTransfer.setData("text/plain", event.target.id);
    }

    // Permitir el "drop" en el área de selección
    function dragOver(event) {
        event.preventDefault();
    }

    // Función para manejar el "drop"
    function drop(event) {
        event.preventDefault();
        const id = event.dataTransfer.getData("text/plain");
        const draggedElement = document.getElementById(id);

        // Limpia el área seleccionada y añade el elemento seleccionado
        areaSeleccionada.innerHTML = "";
        const newElement = draggedElement.cloneNode(true);
        newElement.removeAttribute("draggable");
        areaSeleccionada.appendChild(newElement);
    }
});
