// Ejemplo de cómo agregar elementos a las listas dinámicamente
const videoList = document.getElementById('video-list');
const audioList = document.getElementById('audio-list');

// IMPORTANTE Te dejo estos dos videos para que no pese tanto el archivo

// Arreglos con los datos de los videos y la música
const videos = [
    { id: 1, title: 'Video 1', url: 'campfire.mp4' },
    { id: 2, title: 'Video 2', url: 'campfire.mp4' },
    // ... más videos
];

const audios = [
    { id: 1, title: 'Radio 1', url: 'Blue_Moon.mp3' },
    { id: 2, title: 'Radio 2', url: 'campfire.mp3' },
    // ... más audios
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
    let controles = document.querySelectorAll('#controles li');
    console.log(controles);
    let video = document.getElementById('video');
    controles.forEach(element => {
        switch (element.id) {
            case "Silenciar":
                element.onclick = function() {
                    let auVideo = document.getElementById('video');
                    auVideo.muted = !auVideo.muted;
                }
                break;
            case "-10 segs":
                element.onclick = function() {
                    video.currentTime -= 10;
                }
                break;
            case "Play/Stop":
                element.onclick = function() {
                    // saber si esta pausada o reproduciendo
                    if (video.paused) {
                        video.play();
                    } else {
                        video.pause();
                    }
                }
                break;
            case "+10 segs":
                element.onclick = function() {
                    video.currentTime += 10;
                }
                break;
            case "Reiniciar":
                element.onclick = function() {
                    video.load();
                    video.play();
                }
                break;
            case "+ Vol":
                element.onclick = function() {
                    if (video.volume < 1) {
                        video.volume += 0.1;
                    }
                }
                break;
            case "- Vol":
                element.onclick = function() {
                    if (video.volume > 0) {
                        video.volume -= 0.1;
                    }
                }
                break;
            case "Pantalla completa":
                element.onclick = function() {
                    video.requestFullscreen();
                }
                break;
            default:
                console.log('Defina el boton '+element.textContent);
                break;
        }
    });
}

controls();
