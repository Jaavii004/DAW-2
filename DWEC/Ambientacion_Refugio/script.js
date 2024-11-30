// Ejemplo de cómo agregar elementos a las listas dinámicamente
const videoList = document.getElementById('video-list');
const audioList = document.getElementById('audio-list');

// Arreglos con los datos de los videos y la música
const videos = [
    { id: 1, title: 'Video 1', url: 'campfire.mp4' },
    { id: 2, title: 'Video 2', url: 'video2.mp4' },
    { id: 3, title: 'Video 3', url: 'video2.mp4' },
    // ... más videos
];

const audios = [
    { id: 1, title: 'Radio 1', url: 'Blue_Moon.mp3' },
    { id: 2, title: 'Radio 2', url: 'campfire.mp3' },
    // ... más radios
];

// Función para crear un elemento de lista
function createListItem(list, item) {
    const li = document.createElement('li');
    li.textContent = item.title;
    li.dataset.url = item.url;
    li.id = item.id;
    let queEs = "audio";
    if (item.url.includes("mp4")) {
        queEs = "video"
    }
    li.onclick = function () {
        reproducir(queEs, item.url);
    }
    list.appendChild(li);
}

// Agregar los elementos a las listas
videos.forEach(video => createListItem(videoList, video));
audios.forEach(audio => createListItem(audioList, audio));

// Agregar un event listener para reproducir el video o audio seleccionado
// (Esta parte se puede implementar utilizando un reproductor de video/audio como HTML5 Video o Audio)

function reproducir(queEs, urlArchivo) {
    if (queEs == "video") {
        let videoURL = document.getElementById('cambiarURLvideo');
        videoURL.src = urlArchivo;
        let video = document.getElementById('video');
        video.load();
    } else {
        let audioURL = document.getElementById('cambiarURLaudio');
        audioURL.src = urlArchivo;
        let audio = document.getElementById('audio');
        audio.load();
    }
}

function controls() {
    let controles = document.querySelectorAll('#controles li'); // Seleccionamos todos los <li> dentro de #controles
    console.log(controles);
    controles.forEach(element => {
        switch (element.textContent) {
            case "Silenciar":
                element.onclick = function() {
                    let auVideo = document.getElementById('video');
                    auVideo.muted = !auVideo.muted;
                }
                break;
            case "-10 segs":
                // Aquí va la función para -10 segundos
                console.log('-10 segundos');
                break;
            case "Play/Stop":
                // Aquí va la función para Play/Stop
                console.log('Play/Stop');
                break;
            case "+10 segs":
                // Aquí va la función para +10 segundos
                console.log('+10 segundos');
                break;
            case "Reiniciar":
                // Aquí va la función para reiniciar
                console.log('Reiniciar');
                break;
            case "+ Vol":
                // Aquí va la función para subir el volumen
                console.log('+ Volumen');
                break;
            case "- Vol":
                // Aquí va la función para bajar el volumen
                console.log('- Volumen');
                break;
            default:
                console.log('Acción no definida');
                break;
        }
    });
}

controls();