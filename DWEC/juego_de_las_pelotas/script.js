// Mostrar u ocultar la selección de color según el modo seleccionado
document.querySelectorAll('input[name="modo"]').forEach(function(input) {
    input.addEventListener('change', function() {
        const colorSelection = document.querySelector('.color-selection');
        if (this.value === "color") {
            colorSelection.style.display = 'block';
        } else {
            colorSelection.style.display = 'none';
        }
    });
});

const zonaPelotas = document.getElementById("zonaPelotas");
let color = "";

function CrearPelotas(numPelotas, modo) {
    // Nos aseguramos que no hayan pelotas
    zonaPelotas.innerHTML = '';
    for (let j = 0; j < numPelotas; j++) {
        const pelota = document.createElement('div');
        pelota.classList.add('pelota');

        const colores = ['verde', 'rojo', 'azul'];
        const colorAleatorio = colores[Math.floor(Math.random() * colores.length)];
        pelota.classList.add(colorAleatorio);

        // Tamaño aleatorio de las pelotas entre 20 y 85
        const grandaria = (Math.random() * 65)+20;
        pelota.style.width = grandaria+'px';
        pelota.style.height = grandaria+'px';
        // Posición aleatoria en el ancho
        pelota.style.left = `${Math.random() * (zonaPelotas.clientWidth - 80)}px`;
        // Posición aleatoria en la altura
        pelota.style.top = `${Math.random() * (zonaPelotas.clientHeight - 80)}px`;

        if (modo == "todos") {
            pelota.onclick = function() {
                EliminarPelota(pelota);
                EliminarTodas();
            };
        } else {
            if (colorAleatorio == color.toLocaleLowerCase()) {
                pelota.onclick = function(){
                    EliminarPelota(pelota);
                    EliminarColor(color);
                };
            }
        }
        pelota.ondblclick = function() {
            pelota.classList.add('ocultar');
            console.log("oculta");
            
        };
        zonaPelotas.appendChild(pelota);
    }
}

let contarTiempo = false;
let tiempo_jugando = 0;
setInterval(() => {
    if (contarTiempo) {
        tiempo_jugando++;
        let minutos = Math.floor(tiempo_jugando / 60);
        let segundos = tiempo_jugando % 60;
        document.getElementById('tiempo-jugando').textContent = `${minutos}:${segundos < 10 ? '0' : ''}${segundos}`;
    }
}, 1000);


const bntJugar = document.getElementById("jugar");

bntJugar.addEventListener('click', function() {
    EmpezarJuego();
});

function EmpezarJuego() {
    let ModoJuego = document.querySelector('input[name="modo"]:checked').value;
    if (ModoJuego == "color" && document.querySelector('input[name="color"]:checked') == null) {
        document.getElementById("error").innerText = "Debes seleccionar un color para solo quitar las de un color!!";
        return;
    } else {
        document.getElementById("error").innerText = "";
    }
    const numPelotas = document.getElementById("cantidadPelotas").value;
    tiempo_jugando = 0;
    document.getElementById('tiempo-jugando').textContent = "00:00";
    contarTiempo = true;
    if (ModoJuego == "color") {
        color = document.querySelector('input[name="color"]:checked').value;
    }
    CrearPelotas(numPelotas, ModoJuego);
    // contador a 0
    pelotasEliminadas = 0;
    document.getElementById("resultado").innerHTML = "<p>Se han eliminado <span id='pelotas-eliminadas'>0</span> pelotas</p>"
}

function comprobarSiQuedanPelotas(pelotas) {
    if (pelotas.length != 0) {
        console.log(pelotas.length);
        return false;
    }
    return true;
}


function EliminarTodas() {
    // obtenemos todas las pelotas
    let pelotas = document.getElementsByClassName("pelota");
    if (comprobarSiQuedanPelotas(pelotas)) {
        contarTiempo = false;
        Ganaste();
    }

}

function EliminarColor(color) {
    // obtenemos las pelotas del color
    let pelotas = document.getElementsByClassName("pelota "+color);

    if (comprobarSiQuedanPelotas(pelotas)) {
        contarTiempo = false;
        Ganaste();
    }
}

let pelotasEliminadas = 0;
function EliminarPelota(pelota) {
    pelotasEliminadas +=1;
    document.getElementById("pelotas-eliminadas").innerText = pelotasEliminadas;
    pelota.remove();
}

function Ganaste() {
    let divres = document.getElementById("resultado");

    divres.innerText = "";
    let p = document.createElement("p");
    p.innerText = "Has eliminado " + pelotasEliminadas + " pelotas en "+ tiempo_jugando + " segundos";
    
    let p2 = document.createElement("p");
    let elimiporSeg = (pelotasEliminadas / tiempo_jugando).toFixed(2); 
    p2.innerText = "Has eliminado " + elimiporSeg + " pelotas por segundo";

    divres.appendChild(p);
    divres.appendChild(p2);
}