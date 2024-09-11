/**
 * Convierte el tiempo en milisegundos a un formato de horas, minutos y segundos.
 * @param {number} tiempoMs - Tiempo en milisegundos.
 * @returns {string} Tiempo formateado en horas, minutos y segundos.
 */
function formatoTiempo(tiempoMs) {
    // Convertir el tiempo total a segundos
    const segundosTotales = Math.floor(tiempoMs / 1000);
    
    // Obtener las horas, minutos y segundos
    const horas = Math.floor(segundosTotales / 3600);
    const minutos = Math.floor((segundosTotales % 3600) / 60);
    const segundos = segundosTotales % 60;

    // Formatear con dos dígitos
    const horasFormateadas = horas.toString().padStart(2, '0');
    const minutosFormateados = minutos.toString().padStart(2, '0');
    const segundosFormateados = segundos.toString().padStart(2, '0');

    return `${horasFormateadas}:${minutosFormateados}:${segundosFormateados}`;
}

// Ejemplo de uso
const tiempoInicio = performance.now();

const tiempoFin = performance.now();
const tiempoTranscurrido = tiempoFin - tiempoInicio;

// Muestra el tiempo transcurrido en formato horas:minutos:segundos
console.log(`Tiempo de ejecución: ${formatoTiempo(tiempoTranscurrido)}`);
