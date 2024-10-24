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
    zonaPelotas.innerHTML = ''; // Limpiar la zona antes de crear nuevas pelotas
    for (let j = 0; j < numPelotas; j++) {
        const pelota = document.createElement('div');
        pelota.classList.add('pelota');

        const colores = ['verde', 'roja', 'azul'];
        const colorAleatorio = colores[Math.floor(Math.random() * colores.length)];
        pelota.classList.add(colorAleatorio);
        
        const grandaria = (Math.random() * 65)+20;
        pelota.style.width = grandaria+'px'; // Definir ancho
        pelota.style.height = grandaria+'px'; // Definir alto
        pelota.style.left = `${Math.random() * (zonaPelotas.clientWidth - 30)}px`; // Posición aleatoria en el ancho
        pelota.style.top = `${Math.random() * (zonaPelotas.clientHeight - 30)}px`; // Posición aleatoria en la altura
        zonaPelotas.appendChild(pelota);
    }
}

CrearPelotas(50);