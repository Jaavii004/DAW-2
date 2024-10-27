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

function CrearPelotas(numPelotas) {
    // Nos aseguramos que no hayan pelotas
    zonaPelotas.innerHTML = '';
    for (let j = 0; j <= numPelotas; j++) {
        const pelota = document.createElement('div');
        pelota.classList.add('pelota');

        const colores = ['verde', 'roja', 'azul'];
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
    const numPelotas = document.getElementById("cantidadPelotas").value;
    tiempo_jugando = 0;
    document.getElementById('tiempo-jugando').textContent = "00:00";
    contarTiempo = true;
    CrearPelotas(numPelotas);
    let ModoJuego = document.querySelector('input[name="modo"]:checked').value;
    if (ModoJuego == "color") {
        EliminarColor();
    } else {
        EliminarTodas();
    }
}

function comprobarSiQuedanPelotas(modo) {
    
}


function EliminarTodas() {
    // obtenemos todas las pelotas
    let pelotas = document.getElementsByClassName("pelota");

    for (i = 0; i < pelotas.length; i++) {
        console.log(pelotas[i]);
    }

}

EliminarTodas();
function EliminarColor() {
    let color = document.querySelector('input[name="color"]:checked').value;
    // obtenemos las pelotas del color
    let pelotas = document.getElementsByClassName("pelota "+color);

    for (i = 0; i < pelotas.length; i++) {
        console.log(pelotas[i]);
    }
}