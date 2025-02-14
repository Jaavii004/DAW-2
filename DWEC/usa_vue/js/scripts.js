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
const estados = {
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

Vue.createApp({
    data() {
        return {
            showModal: false,
            showImgModal: false,
            selectedState: "",
            currentDate: "",
            currentTime: "",
            forecastData: [],
            carouselImages: []
        };
    },
    methods: {
        async areaOnClick(area) {
            // area es el elemento <area> clickeado
            this.selectedState = area.title;
            const coords = estados[area.title];
            if (!coords) {
                console.error("No se encontraron coordenadas para el estado:", area.title);
                return;
            }
            try {
                // Solicita el pronóstico
                const response = await fetch(`https://api.weatherusa.net/v1/forecast?q=${coords.latitude},${coords.longitude}&daily=0&units=m&maxtime=1d`);
                const data = await response.json();
                this.procesarPronostico(data, coords);
            } catch (error) {
                console.error("Error al obtener el pronóstico:", error);
            }
            try {
                // Solicita las imágenes de la cámara
                const responseIMG = await fetch(`https://api.weatherusa.net/v1/skycams?q=${coords.latitude},${coords.longitude}`);
                const dataIMG = await responseIMG.json();
                this.procesarImagenes(dataIMG);
            } catch (error) {
                console.error("Error al obtener las imágenes:", error);
            }
            this.showModal = true;
        },
        procesarPronostico(data, coords) {
            if (!data || data.length === 0) return;
            const first = data[0];
            let baseDate = new Date(first.validt * 1000);
            // Ajustamos la hora según el desfase del estado
            baseDate = new Date(baseDate.getTime() + coords.hora * 3600000);
            this.currentDate = baseDate.toLocaleDateString("es-ES", {
                year: "numeric",
                month: "2-digit",
                day: "2-digit"
            });
            this.currentTime = baseDate.toLocaleTimeString("es-ES", {
                hour: "2-digit",
                minute: "2-digit"
            });
            // Procesa los primeros 11 registros del pronóstico
            this.forecastData = data.slice(0, 11).map(item => {
                const itemDate = new Date(item.validt * 1000 + coords.hora * 3600000);
                return {
                    formattedTime: itemDate.toLocaleTimeString("es-ES", { hour: "2-digit", minute: "2-digit" }),
                    temp: item.temp,
                    wspd: item.wspd,
                    wdir_compass: item.wdir_compass,
                    wx_icon: item.wx_icon,
                    img: icono[item.wx_icon] || "https://icones.pro/wp-content/uploads/2021/05/icone-question-bleu.png",
                    imgDirVent: iconoViento[item.wdir_compass] || "<i class='fas fa-wind wind-icon wind-ese'></i>"
                };
            });
        },
        procesarImagenes(dataIMG, stateName) {
            this.selectedState = stateName; // Guardar el nombre del estado o categoría
            this.carouselImages = dataIMG.map(data => data.image);

            // Si no hay imágenes, poner una imagen de error
            if (this.carouselImages.length === 0) {
                this.carouselImages = [
                    "https://img.freepik.com/premium-photo/tv-has-no-signal-no-signal-noise-background_41050-4394.jpg",
                ];
            }
        },
        ocultarModal() {
            this.showModal = false;
            this.showImgModal = false;
        },
        verImgEstado() {
            this.showModal = false;
            document.getElementById("fondo").classList.add("oculto");
            this.showImgModal = true;
            const fondo = document.getElementById("fondo");
            fondo.addEventListener("click", () => {
                this.cerrarImgEstado();
            });
        },
        cerrarImgEstado() {
            this.showImgModal = false;
            this.showModal = true;
        }
    },
    mounted() {
        // Agrega un listener a cada elemento <area> para que invoque areaOnClick al hacer click
        const areas = document.querySelectorAll("area");
        areas.forEach(area => {
            area.addEventListener("click", event => {
                event.preventDefault();
                this.areaOnClick(area);
            });
        });
    }
}).mount("#app");