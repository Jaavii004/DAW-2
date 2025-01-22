var estados = {
    Alabama: { latitude: 32.806671, longitude: -86.79113 },
    Alaska: { latitude: 61.370716, longitude: -152.404419 },
    Arizona: { latitude: 33.729759, longitude: -111.431221 },
    Arkansas: { latitude: 34.969704, longitude: -92.373123 },
    California: { latitude: 36.116203, longitude: -119.681564 },
    Colorado: { latitude: 39.550051, longitude: -105.782067 },
    Connecticut: { latitude: 41.603221, longitude: -73.087749 },
    Delaware: { latitude: 38.910832, longitude: -75.52767 },
    Florida: { latitude: 27.766279, longitude: -81.686783 },
    Georgia: { latitude: 33.040619, longitude: -83.643074 },
    Hawái: { latitude: 21.094318, longitude: -157.498337 },
    Idaho: { latitude: 44.299782, longitude: -114.513285 },
    Illinois: { latitude: 40.673358, longitude: -89.398528 },
    Indiana: { latitude: 39.838434, longitude: -86.158043 },
    Iowa: { latitude: 42.011539, longitude: -93.210526 },
    Kansas: { latitude: 38.5266, longitude: -96.726486 },
    Kentucky: { latitude: 37.66814, longitude: -84.670067 },
    Luisiana: { latitude: 31.169546, longitude: -91.867805 },
    Maine: { latitude: 44.693947, longitude: -69.381927 },
    Maryland: { latitude: 39.063946, longitude: -76.802101 },
    Massachusetts: { latitude: 42.230171, longitude: -71.530106 },
    Míchigan: { latitude: 42.326515, longitude: -83.636719 },
    Minnesota: { latitude: 46.729553, longitude: -94.685899 },
    Misisipi: { latitude: 32.741646, longitude: -89.678696 },
    Misuri: { latitude: 36.5361, longitude: -89.831234 },
    Montana: { latitude: 46.921925, longitude: -110.454353 },
    Nebraska: { latitude: 41.12537, longitude: -98.268082 },
    Nevada: { latitude: 38.313515, longitude: -117.055374 },
    "Nuevo Hampshire": { latitude: 43.452492, longitude: -71.563896 },
    "Nueva Jersey": { latitude: 40.298904, longitude: -74.521011 },
    "Nuevo México": { latitude: 34.840515, longitude: -106.248482 },
    "Nueva York": { latitude: 40.712776, longitude: -74.005974 },
    "Carolina del Norte": { latitude: 35.630066, longitude: -79.806419 },
    "Dakota del Norte": { latitude: 47.528912, longitude: -99.784012 },
    Ohio: { latitude: 40.388783, longitude: -82.764915 },
    Oklahoma: { latitude: 35.565342, longitude: -96.928917 },
    Oregón: { latitude: 43.930092, longitude: -119.695846 },
    Pensilvania: { latitude: 40.590752, longitude: -77.209755 },
    "Rhode Island": { latitude: 41.680894, longitude: -71.51178 },
    "Carolina del Sur": { latitude: 33.856892, longitude: -80.945007 },
    "Dakota del Sur": { latitude: 44.299782, longitude: -99.438828 },
    Tennessee: { latitude: 35.747845, longitude: -86.692345 },
    Texas: { latitude: 31.054487, longitude: -97.563461 },
    Utah: { latitude: 40.150032, longitude: -111.862434 },
    Vermont: { latitude: 44.045876, longitude: -72.710686 },
    Virginia: { latitude: 37.769337, longitude: -78.169968 },
    Washington: { latitude: 47.400902, longitude: -121.490495 },
    "Virginia Occidental": { latitude: 38.491226, longitude: -80.954522 },
    Wisconsin: { latitude: 43.78444, longitude: -88.787868 },
    Wyoming: { latitude: 42.755966, longitude: -107.30249 },
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
    "TEMP": "https://www.weatherbit.io/static/img/icons/c01d.png",   // TEMP (Ejemplo de icono si es necesario)
    "ts_ra": "https://www.weatherbit.io/static/img/icons/t01d.png",   // Tormenta con lluvia (ts_ra)
    "ra": "https://www.weatherbit.io/static/img/icons/t01d.png",     // Lluvia (ra)
};


const iconoViento = {
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
    "ESE": "<i class='fas fa-wind wind-icon wind-ese'></i>"  // Este-sureste
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
    
    let prim = data.slice(0, 1);
    let titulo = document.getElementById("titulo");
    titulo.innerHTML = area.title;
    let table = document.getElementById("tbody");
    table.innerHTML = "";


    console.log(prim);
    
    // • validt: que se trata de la marca de tiempo. Hay que convertirla en formato fecha.
    // • localtime: Indica la hora en la que nos encontramos.
    // • temp: temperatura para la hora indicada.
    // • wdir_compass: Dirección del tiempo.
    // • wspd: Velocidad del viento.

    data.slice(1, 11).forEach(temp => {
        console.log(temp.wx_icon);
        let img = icono[temp.wx_icon];
        if (img === undefined) {
            console.log(`TEMP undefined ${temp.wx_icon}`);
            img = "https://icones.pro/wp-content/uploads/2021/05/icone-question-bleu.png"
        }

        let imgDirVent = iconoViento[temp.wdir_compass];
 
        table.innerHTML += `
            <tr>
                <td>${temp.localtime} <img src="${img}" width="32" height="32" alt="Icono ${temp.wx_icon}"></td>
                <td>${temp.temp}<img src="https://cdn.eltiempo.es/dist/images/icons/general/svg/temperature-blue.svg" width="32" height="32" alt="Icono Temp"></td>
                <td>${temp.wspd}Km/h</td>
                <td>${temp.wdir_compass} ${imgDirVent}</td>
            </tr>
        `;
    });

    MostrarModal();
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
}


