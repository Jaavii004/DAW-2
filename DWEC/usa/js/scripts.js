var estados = {
    Alabama: { latitude: 32.806671, longitude: -86.79113, hora: -6 },
    Alaska: { latitude: 61.370716, longitude: -152.404419, hora: -9 },
    Arizona: { latitude: 33.729759, longitude: -111.431221, hora: -7 },
    Arkansas: { latitude: 34.969704, longitude: -92.373123, hora: -6 },
    California: { latitude: 36.116203, longitude: -119.681564, hora: -8 },
    Colorado: { latitude: 39.550051, longitude: -105.782067, hora: -7 },
    Connecticut: { latitude: 41.603221, longitude: -73.087749, hora: -5 },
    Delaware: { latitude: 38.910832, longitude: -75.52767, hora: -5 },
    Florida: { latitude: 27.766279, longitude: -81.686783, hora: -5 },
    Georgia: { latitude: 33.040619, longitude: -83.643074, hora: -5 },
    Hawái: { latitude: 21.094318, longitude: -157.498337, hora: -10 },
    Idaho: { latitude: 44.299782, longitude: -114.513285, hora: -7 },
    Illinois: { latitude: 40.673358, longitude: -89.398528, hora: -6 },
    Indiana: { latitude: 39.838434, longitude: -86.158043, hora: -5 },
    Iowa: { latitude: 42.011539, longitude: -93.210526, hora: -6 },
    Kansas: { latitude: 38.5266, longitude: -96.726486, hora: -6 },
    Kentucky: { latitude: 37.66814, longitude: -84.670067, hora: -5 },
    Luisiana: { latitude: 31.169546, longitude: -91.867805, hora: -6 },
    Maine: { latitude: 44.693947, longitude: -69.381927, hora: -5 },
    Maryland: { latitude: 39.063946, longitude: -76.802101, hora: -5 },
    Massachusetts: { latitude: 42.230171, longitude: -71.530106, hora: -5 },
    Míchigan: { latitude: 42.326515, longitude: -83.636719, hora: -5 },
    Minnesota: { latitude: 46.729553, longitude: -94.685899, hora: -6 },
    Misisipi: { latitude: 32.741646, longitude: -89.678696, hora: -6 },
    Misuri: { latitude: 36.5361, longitude: -89.831234, hora: -6 },
    Montana: { latitude: 46.921925, longitude: -110.454353, hora: -7 },
    Nebraska: { latitude: 41.12537, longitude: -98.268082, hora: -6 },
    Nevada: { latitude: 38.313515, longitude: -117.055374, hora: -8 },
    "Nuevo Hampshire": { latitude: 43.452492, longitude: -71.563896, hora: -5 },
    "Nueva Jersey": { latitude: 40.298904, longitude: -74.521011, hora: -5 },
    "Nuevo México": { latitude: 34.840515, longitude: -106.248482, hora: -7 },
    "Nueva York": { latitude: 40.712776, longitude: -74.005974, hora: -5 },
    "Carolina del Norte": { latitude: 35.630066, longitude: -79.806419, hora: -5 },
    "Dakota del Norte": { latitude: 47.528912, longitude: -99.784012, hora: -6 },
    Ohio: { latitude: 40.388783, longitude: -82.764915, hora: -5 },
    Oklahoma: { latitude: 35.565342, longitude: -96.928917, hora: -6 },
    Oregón: { latitude: 43.930092, longitude: -119.695846, hora: -8 },
    Pensilvania: { latitude: 40.590752, longitude: -77.209755, hora: -5 },
    "Rhode Island": { latitude: 41.680894, longitude: -71.51178, hora: -5 },
    "Carolina del Sur": { latitude: 33.856892, longitude: -80.945007, hora: -5 },
    "Dakota del Sur": { latitude: 44.299782, longitude: -99.438828, hora: -6 },
    Tennessee: { latitude: 35.747845, longitude: -86.692345, hora: -6 },
    Texas: { latitude: 31.054487, longitude: -97.563461, hora: -6 },
    Utah: { latitude: 40.150032, longitude: -111.862434, hora: -7 },
    Vermont: { latitude: 44.045876, longitude: -72.710686, hora: -5 },
    Virginia: { latitude: 37.769337, longitude: -78.169968, hora: -5 },
    Washington: { latitude: 47.400902, longitude: -121.490495, hora: -8 },
    "Virginia Occidental": { latitude: 38.491226, longitude: -80.954522, hora: -5 },
    Wisconsin: { latitude: 43.78444, longitude: -88.787868, hora: -6 },
    Wyoming: { latitude: 42.755966, longitude: -107.30249, hora: -7 }
};


document.addEventListener("DOMContentLoaded" , function() {
    const areas = document.querySelectorAll("area");

    areas.forEach(area => {
        area.addEventListener("click", function(){AreaOnClick(area)});
    });

});

const icono = {
    "lt_sn": "https://www.weatherbit.io/static/img/icons/t01d.png",   // Lluvia ligera o nevada
    "pt_cloudy_night": "https://www.weatherbit.io/static/img/icons/c02n.png", // Noche parcialmente nublada
    "clear_night": "https://www.weatherbit.io/static/img/icons/c01n.png",   // Noche despejada
    "few_clouds": "https://www.weatherbit.io/static/img/icons/c03d.png",    // Pocas nubes
    "scattered_clouds": "https://www.weatherbit.io/static/img/icons/c04d.png", // Nubes dispersas
    "chance_of_snow": "https://www.weatherbit.io/static/img/icons/t02d.png",  // Posibilidad de nieve
    "clear": "https://www.weatherbit.io/static/img/icons/c01d.png", // Clear icon for "clear"
    "mt_cloudy": "https://www.weatherbit.io/static/img/icons/c04d.png",  // Mountain cloudy
    "overcast": "https://www.weatherbit.io/static/img/icons/c04d.png",  // Overcast
    "sn": "https://www.weatherbit.io/static/img/icons/t01d.png",  // Snow (heavy snow)
    "mt_cloudy_night": "https://www.weatherbit.io/static/img/icons/c04n.png", // Noche montañosa nublada
    "pt_cloudy": "https://www.weatherbit.io/static/img/icons/c03d.png", // Cielo parcialmente nublado
    "ts_ra": "https://www.weatherbit.io/static/img/icons/t01d.png",   // Tormenta con lluvia (ts_ra)
    "ra": "https://www.weatherbit.io/static/img/icons/t01d.png",     // Lluvia (ra)
};


const iconoViento = {
    "WNW": "<i class='fas fa-wind wind-icon wind-wnw'></i>",
    "SW": "<i class='fas fa-wind wind-icon wind-sw'></i>",  // Suroeste
    "NW": "<i class='fas fa-wind wind-icon wind-nw'></i>",  // Noroeste
    "NNW": "<i class='fas fa-wind wind-icon wind-nnw'></i>", // Noroeste-norte
    "N": "<i class='fas fa-wind wind-icon wind-n'></i>",   // Norte
    "NE": "<i class='fas fa-wind wind-icon wind-ne'></i>",  // Noreste
    "ENE": "<i class='fas fa-wind wind-icon wind-ene'></i>", // Este-Noreste (nuevo)
    "E": "<i class='fas fa-wind wind-icon wind-e'></i>",   // Este
    "SE": "<i class='fas fa-wind wind-icon wind-se'></i>",  // Sureste
    "S": "<i class='fas fa-wind wind-icon wind-s'></i>",   // Sur
    "SSW": "<i class='fas fa-wind wind-icon wind-ssw'></i>", // Suroeste-sur
    "WSW": "<i class='fas fa-wind wind-icon wind-wsw'></i>", // Oeste-suroeste
    "W": "<i class='fas fa-wind wind-icon wind-w'></i>",   // Oeste
    "ESE": "<i class='fas fa-wind wind-icon wind-ese'></i>",  // Este-sureste
    "SSE": "<i class='fas fa-wind wind-icon wind-sse'></i>" // Sur-sureste
};

async function AreaOnClick (area) {
    console.log(area.title);
    console.log(estados[area.title]);

    const response = await fetch(`https://api.weatherusa.net/v1/forecast?q=${estados[area.title].latitude},${estados[area.title].longitude}&daily=0&units=m&maxtime=1d`);
    const data = await response.json();
    console.log(data);

    // localtime: Hora
    // rhm: Humedad relativa en el aire
    // temp: Temperatura actual en grados Celsius
    // wdir: Dirección del viento en grados
    // wx_icon: Icono que representa las condiciones meteorológicas
    // pop12: Probabilidad de precipitación en las próximas 12 horas
    // wdir_compass: Dirección del viento en términos de los puntos cardinales
    // wspd: Velocidad del viento promedio

    // • validt: que se trata de la marca de tiempo. Hay que convertirla en formato fecha.
    // • localtime: Indica la hora en la que nos encontramos.
    // • temp: temperatura para la hora indicada.
    // • wdir_compass: Dirección del tiempo.
    // • wspd: Velocidad del viento.

    let prim = data[0];
    let titulo = document.getElementById("titulo");
    titulo.innerHTML = area.title;
    let table = document.getElementById("tbody");
    // Vaciar la tabla
    table.innerHTML = "";

    let miliseg = prim.validt * 1000;
    let fecha = new Date(miliseg);
    document.getElementById("fecha").innerText = fecha.toLocaleDateString("es-ES", {
        year: "numeric",
        month: "2-digit",
        day: "2-digit"
    });

    document.getElementById("hora").innerHTML = fecha.toLocaleTimeString("es-ES", {
        hour: "2-digit",
        minute: "2-digit"
    });

    data.slice(0, 11).forEach(temp => {
        //console.log(temp.wx_icon);
        let img = icono[temp.wx_icon];
        if (img === undefined) {
            console.log(`TEMP undefined ${temp.wx_icon}`);
            img = "https://icones.pro/wp-content/uploads/2021/05/icone-question-bleu.png"
        }

        let imgDirVent = iconoViento[temp.wdir_compass];
        if (imgDirVent === undefined) {
            console.log(`TEMP undefined ${temp.wdir_compass}`);
            imgDirVent = "<i class='fas fa-wind wind-icon wind-ese'></i>";
        }

        let miliseg = temp.validt * 1000;
        
        // tener la hora en milisegundos
        let horaalli = new Date(miliseg + (estados[area.title].hora * 3600000));
        
        let formattedDate = horaalli.toLocaleTimeString("es-ES", {
            hour: "2-digit",
            minute: "2-digit"
        });

        table.innerHTML += `
            <tr>
                <td>${formattedDate} <img src="${img}" width="32" height="32" alt="Icono ${temp.wx_icon}"></td>
                <td>${temp.temp}<img src="https://cdn.eltiempo.es/dist/images/icons/general/svg/temperature-blue.svg" width="32" height="32" alt="Icono Temp"></td>
                <td>${temp.wspd}Km/h</td>
                <td>${temp.wdir_compass} ${imgDirVent}</td>
            </tr>
        `;
    });

    MostrarModal();

    const responseIMG = await fetch(`https://api.weatherusa.net/v1/skycams?q=${estados[area.title].latitude},${estados[area.title].longitude}`);
    const dataIMG = await responseIMG.json();

    let todasLasImg = [];

    dataIMG.forEach(data => {
        todasLasImg.push(data.image);
    });

    console.log(todasLasImg);

    // Construir el carrusel dinámicamente
    const carouselInner = document.getElementById("carousel-inner");
    // Limpiar el carrusel antes de agregar nuevas imágenes
    carouselInner.innerHTML = "";

    if (todasLasImg.length > 0) {
        todasLasImg.forEach((img, index) => {
            const carouselItem = document.createElement("div");
            carouselItem.classList.add("carousel-item");
            if (index === 0) {
                carouselItem.classList.add("active"); // La primera imagen estará activa
            }

            const imgElement = document.createElement("img");
            imgElement.src = img;
            imgElement.alt = `Imagen ${index + 1} de ${area.title}`;
            imgElement.classList.add("d-block", "w-100");
            imgElement.style.maxHeight = "400px";
            imgElement.style.objectFit = "cover";

            carouselItem.appendChild(imgElement);
            carouselInner.appendChild(carouselItem);
        });
    } else {
        // Si no hay imágenes, mostrar una imagen de placeholder
        const carouselItem = document.createElement("div");
        carouselItem.classList.add("carousel-item", "active");

        const imgElement = document.createElement("img");
        imgElement.src = "https://img.freepik.com/premium-photo/tv-has-no-signal-no-signal-noise-background_41050-4394.jpg";
        imgElement.alt = "No hay imágenes disponibles";
        imgElement.classList.add("d-block", "w-100");
        imgElement.style.maxHeight = "400px";
        imgElement.style.objectFit = "cover";

        carouselItem.appendChild(imgElement);
        carouselInner.appendChild(carouselItem);
    }

    document.getElementById("titulo-imagen").innerText = "Imágenes de " + area.title;
}


function MostrarModal() {
    let fondo = document.getElementById("fondo");
    let modal = document.getElementById("modal");

    fondo.classList.remove("oculto");
    modal.classList.remove("oculto");

    fondo.addEventListener("click", function(){OcultarModal()});
}

function OcultarModal() {
    let fondo = document.getElementById("fondo");
    let modal = document.getElementById("modal");

    fondo.classList.add("oculto");
    modal.classList.add("oculto");

    let modalimg = document.getElementById("modal-img");


    modalimg.classList.add("oculto");
}

function VerImgEstado() {
    OcultarModal();
    let fondo = document.getElementById("fondo");

    fondo.classList.remove("oculto");
    let modalimg = document.getElementById("modal-img");

    modalimg.classList.remove("oculto");

    fondo.addEventListener("click", function(){cerrarImgEstado()});
}

function cerrarImgEstado() {
    let modalimg = document.getElementById("modal-img");

    modalimg.classList.add("oculto");
    MostrarModal();
}
