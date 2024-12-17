// Arreglos con los datos de los videos y la música
const videos = [
    { id: 1, title: 'Video 1', url: 'campfire.mp4', thumbnail: 'video-thumbnail1.jpg' },
    { id: 2, title: 'Video 2', url: 'campfire.mp4', thumbnail: 'video-thumbnail2.jpg' },
    // ... más videos
];

const audios = [
    { id: 1, title: 'Radio 1', url: 'Blue_Moon.mp3', thumbnail: 'audio-thumbnail1.jpg' },
    { id: 2, title: 'Radio 2', url: 'campfire.mp3', thumbnail: 'audio-thumbnail2.jpg' },
    // ... más audios
];

// Función para cargar los videos
function cargarVideos() {
    const videoList = document.getElementById('video-list');
    videos.forEach(video => {
        const div = document.createElement('div');
        div.classList.add('media');
        div.onclick = () => cambiarVideo(video.url);
        div.innerHTML = `
            <img src="${video.thumbnail}" alt="${video.title}">
            <p>${video.title}</p>
        `;
        videoList.appendChild(div);
    });
}

// Función para cambiar el video
function cambiarVideo(url) {
    const videoElement = document.getElementById('video');
    const source = document.getElementById('cambiarURLvideo');
    source.src = url;
    videoElement.load();
    videoElement.play();
}

// Función para cargar los audios
function cargarAudios() {
    const audioList = document.getElementById('audio-list');
    audios.forEach(audio => {
        const div = document.createElement('div');
        div.classList.add('media');
        div.onclick = () => cambiarAudio(audio.url);
        div.innerHTML = `
            <img src="${audio.thumbnail}" alt="${audio.title}">
            <p>${audio.title}</p>
        `;
        audioList.appendChild(div);
    });
}

// Función para cambiar el audio
function cambiarAudio(url) {
    const audioElement = document.getElementById('audio');
    const source = document.getElementById('cambiarURLaudio');
    source.src = url;
    audioElement.load();
    audioElement.play();
}

// Inicializar las listas
document.addEventListener('DOMContentLoaded', () => {
    cargarVideos();
    cargarAudios();
});
