const palabras = [
    "abaco", "abajo", "abate", "abeto", "abusa", "acero", "acido", "aclar", "adios", "aforo",
    "aguda", "ajeno", "ajuar", "alaba", "alamo", "alero", "aleta", "alino", "aliso", "almas",
    "alura", "amaru", "ambos", "ancla", "anima", "antes", "aparo", "apena", "apodo", "arbor",
    "arcos", "arena", "aroma", "arido", "asado", "asilo", "asilo", "atras", "atras", "avion",
    "bacas", "bache", "banco", "banda", "barco", "barro", "bazar", "beber", "bicho", "biran",
    "bocad", "borde", "brava", "brisa", "broma", "buena", "cabro", "cacao", "cadao", "calor",
    "calle", "canto", "carro", "casas", "causa", "cebra", "celos", "cello", "cento", "cerca",
    "chico", "choco", "cielo", "claro", "clavo", "cobra", "colas", "corte", "costa", "cubos",
    "cumba", "curar", "dameo", "darle", "decir", "dedos", "denso", "dolar", "dudor", "durar",
    "echar", "edito", "efect", "ejido", "elige", "elito", "emula", "enter", "esmas", "espol",
    "famos", "faroa", "feliz", "feste", "fiesta", "fuego", "ganas", "garra", "gente", "globo",
    "grano", "grito", "habla", "hacia", "hacha", "hielo", "horas", "humor", "ideal", "igual",
    "inflo", "juego", "joven", "juvio", "justo", "kilos", "largo", "lavar", "letra", "licor",
    "linda", "luzar", "malas", "mango", "march", "marzo", "media", "melas", "mismo", "mitos",
    "mover", "mujer", "nacer", "naves", "neuma", "nivel", "noche", "nuevo", "ocupa", "ofrer",
    "opaco", "oscur", "pacto", "pagar", "paila", "pared", "pasar", "pecho", "pegar", "picor",
    "pista", "plena", "poder", "polla", "punto", "quema", "quero", "quien", "quiza", "radio",
    "rango", "razas", "rebas", "rebel", "revue", "roble", "roque", "ruido", "salas", "salir",
    "salto", "salsa", "santo", "sello", "siete", "silva", "socio", "solas", "somos", "tarde",
    "tinta", "topes", "tropa", "tumor", "ubica", "ufano", "ulari", "unido", "valle", "vario",
    "veras", "vigor", "viver", "voces", "votar", "yacer", "yogur", "zorro", "abisa", "acato",
    "acero", "adios", "afine", "ajuar", "alabo", "aliso", "alque", "alred", "ancla", "aroma",
    "aroma", "atros", "avido", "bache", "bajar", "bande", "barco", "besos", "bicho", "bocan",
    "borde", "breve", "bruto", "cacer", "cabro", "caelo", "calor", "calas", "camas", "canal",
    "carne", "celos", "cenar", "chaos", "chapa", "chino", "cierto", "claro", "cobro", "color",
    "corte", "credo", "cuero", "dango", "darte", "dedos", "dejar", "denso", "difas", "donde",
    "dorar", "ducha", "echar", "eligi", "elevo", "emana", "enelo", "enojo", "envio", "epoca",
    "escas", "esmas", "estre", "feliz", "feros", "figura", "firme", "flote", "fuego", "garra",
    "globo", "grato", "guapa", "habla", "hacia", "hielo", "hilos", "hombre", "horas", "humor",
    "humos", "igual", "jugar", "juvio", "kilos", "lente", "loque", "luces", "madre", "masas",
    "media", "mejor", "memas", "miles", "mismo", "monta", "mujer", "nacer", "naves", "negar",
    "nivel", "nubes", "nunca", "ocupa", "ofrer", "ojera", "opaco", "orito", "pacta", "pagar",
    "pegar", "perra", "peque", "picor", "plena", "poder", "pones", "quema", "quero", "quien",
    "razas", "rebel", "revan", "roble", "rocas", "salas", "salto", "siete", "socio", "sordo",
    "suele", "tampa", "tanto", "temas", "terro", "tiempo", "tinta", "topes", "tribu", "tumor",
    "ubica", "ufano", "ulcer", "unido", "valle", "vapor", "vario", "veras", "vigor", "voces",
    "votar", "yacer", "yogur", "zorro", "abusa", "acara", "acero", "alaba", "alber", "aleta",
    "aloja", "altao", "altos", "aroma", "atras", "augar", "bacas", "bajar", "banal", "barco",
    "beber", "bicho", "blusa", "boqui", "borde", "bruto", "cabra", "canas", "canto", "caras",
    "casco", "casas", "cebra", "cello", "cerca", "chapa", "chico", "chico", "clavo", "corte",
    "corte", "cubos", "darle", "decir", "denso", "dolar", "dudor", "duran", "ecuar", "efect",
    "ejezo", "eligi", "elito", "enter", "fango", "faros", "fator", "feliz", "fiesta", "floja",
    "fondo", "fuego", "ganar", "ganas", "garra", "globo", "gordo", "grito", "habla", "hacia",
    "hacha", "hielo", "hilos", "horas", "humor", "humor", "inflo", "joven", "juvio", "kilos",
    "largo", "linda", "llama", "logra", "lucir", "madre", "malas", "mando", "marca", "media",
    "melas", "mismo", "monta", "mujer", "nacer", "naves", "negar", "neuma", "nivel", "nubes",
    "nunca", "ocupa", "opaco", "orito", "pacto", "pagar", "pegar", "pleno", "poder", "punto",
    "quema", "quien", "quiza", "razas", "rebel", "roble", "roque", "salas", "salto", "santo",
    "sello", "seman", "socio", "somos", "sordo", "suele", "tarde", "tejer", "tiempo", "topes",
    "tumor", "ubica", "ufano", "ulcer", "unido", "valle", "vapor", "voces", "yacer", "zorro",
    "abano", "abaro", "abono", "acelo", "aforo", "aguar", "ajeno", "ajuar", "alato", "alelo",
    "almas", "alaro", "aliso", "altos", "aludo", "amigo", "andar", "apoco", "apolo", "aroma",
    "arida", "aroma", "asilo", "asuma", "ataca", "bacas", "baile", "banco", "banda", "barro",
    "bazar", "beber", "bioma", "bicho", "bingo", "bocad", "borde", "braco", "brava", "brisa",
    "bueno", "cabro", "cacao", "cadao", "caldo", "calas", "calor", "camas", "canas", "carne",
    "carro", "casas", "causa", "cebra", "celos", "cenar", "chaco", "chaos", "checo", "chico",
    "chino", "choca", "chule", "cielo", "clavo", "cobro", "colas", "collo", "corre", "corte",
    "costa", "cubos", "cuero", "dango", "darte", "dedos", "dejar", "dejar", "denso", "difas",
    "dolar", "ducha", "echar", "edito", "efect", "eligi", "elevo", "enelo", "envio", "epoca",
    "escas", "esmas", "estre", "feliz", "firme", "flore", "fuego", "ganas", "garra", "gente",
    "globo", "grano", "guapa", "habla", "hacia", "hacha", "hielo", "hilos", "hombre", "horas",
    "humor", "humor", "igual", "jugar", "juvio", "kilos", "lente", "loque", "luces", "madre",
    "malas", "mando", "marca", "media", "mejor", "mejor", "mismo", "monta", "mujer", "nacer",
    "naves", "nunca", "ocupa", "opaco", "orito", "pacto", "pagar", "pegar", "picor", "plena",
    "poder", "polla", "punto", "quema", "quero", "quien", "quiza", "radio", "razas", "rebel",
    "roble", "roque", "salas", "salto", "santo", "sello", "silva", "socio", "somos", "sordo",
    "suele", "tarde", "tiempo", "tinta", "topes", "tribu", "tumor", "ubica", "ufano", "ulcer",
    "unido", "valle", "vario", "veras", "vigor", "voces", "votar", "yacer", "yogur", "zorro",
    "abano", "abano", "acilo", "adobe", "afora", "aguar", "ajeno", "ajuar", "alato", "alelo",
    "almas", "alaro", "albas", "aliso", "altao", "aludo", "amigo", "andar", "apolo", "aroma",
    "aroma", "asilo", "asuma", "ataca", "bacas", "bache", "banco", "banda", "barco", "barro",
    "bazar", "beber", "bicho", "bingo", "bocad", "borde", "braco", "brava", "brisa", "bueno",
    "cabro", "cacao", "cadao", "caldo", "calas", "calor", "camas", "canas", "carne", "carro",
    "casas", "causa", "cebra", "celos", "cenar", "chaco", "chaos", "checo", "chico", "chino",
    "choca", "chule", "cielo", "clavo", "cobro", "colas", "collo", "corre", "corte", "costa",
    "cubos", "cuero", "dango", "darte", "dedos", "dejar", "dejar", "denso", "difas", "dolar",
    "ducha", "echar", "edito", "efect", "eligi", "elevo", "enelo", "envio", "epoca", "escas",
    "esmas", "estre", "feliz", "firme", "flore", "fuego", "ganas", "garra", "gente", "globo",
    "grano", "guapa", "habla", "hacia", "hacha", "hielo", "hilos", "hombre", "horas", "humor",
    "humor", "igual", "jugar", "juvio", "kilos", "lente", "loque", "luces", "madre", "malas",
    "mando", "marca", "media", "mejor", "mejor", "mismo", "monta", "mujer", "nacer", "naves",
    "nunca", "ocupa", "opaco", "orito", "pacto", "pagar", "pegar", "picor", "plena", "poder",
    "polla", "punto", "quema", "quero", "quien", "quiza", "radio", "razas", "rebel", "roble",
    "roque", "salas", "salto", "santo", "sello", "silva", "socio", "somos", "sordo", "suele",
    "tarde", "tiempo", "tinta", "topes", "tribu", "tumor", "ubica", "ufano", "ulcer", "unido",
    "valle", "vario", "veras", "vigor", "voces", "votar", "yacer", "yogur", "zorro", "abaco",
    "abajo", "abate", "abeto", "abusa", "acero", "acido", "aclar", "adios", "aforo", "aguda",
    "ajeno", "ajuar", "alaba", "alamo", "alero", "aleta", "alino", "aliso", "almas", "alura",
    "amaru", "ambos", "ancla", "anima", "antes", "aparo", "apena", "apodo", "arbor", "arcos",
    "arena", "aroma", "arido", "asado", "asilo", "asilo", "atras", "atras", "avion", "bacas",
    "bache", "banco", "banda", "barco", "barro", "bazar", "beber", "bicho", "biran", "bocad",
    "borde", "brava", "brisa", "broma", "buena", "cabra", "cabro", "cadao", "calor", "calle",
    "canto", "carro", "casas", "causa", "cebra", "celos", "cello", "cento", "cerca", "chaos",
    "chico", "choca", "cielo", "claro", "clavo", "cobra", "colas", "corte", "costa", "cubos",
    "cumba", "dameo", "darle", "decir", "dedos", "denso", "dolar", "dudor", "durar", "echar",
    "edito", "efect", "efect", "ejezo", "ejido", "elige", "elito", "emula", "enter", "escen",
    "esmas", "espol", "famos", "faroa", "feliz", "feste", "fiesta", "fuego", "galas", "garra",
    "gente", "globo", "grano", "grito", "habla", "hacia", "hacha", "hielo", "hurto", "ideal",
    "igual", "inflo", "juego", "joven", "juvio", "justo", "kilos", "largo", "lavar", "letra",
    "licor", "linda", "luzar", "malas", "mango", "march", "marzo", "media", "melas", "mismo",
    "mitos", "mover", "mujer", "nacer", "naves", "negar", "nivel", "noche", "nuevo", "ocupa",
    "ofrer", "opaco", "oscur", "pacto", "pagar", "paila", "pared", "pasar", "pecho", "pegar",
    "picor", "pista", "plena", "poder", "polla", "punto", "quema", "quero", "quien", "quiza",
    "radio", "rango", "razas", "rebas", "rebel", "revue", "roble", "roque", "ruido", "salas",
    "salir", "salto", "salsa", "santo", "sello", "siete", "silva", "socio", "solas", "somos",
    "tarde", "tinta", "topes", "tropa", "tumor", "ubica", "ufano", "ulari", "unido", "valle",
    "vario", "veras", "vigor", "viver", "voces", "votar", "yacer", "yogur", "zorro", "abisa",
    "acato", "acero", "adios", "afine", "ajuar", "alabo", "aliso", "alque", "alred", "ancla",
    "aroma", "aroma", "atros", "avido", "bache", "bajar", "bande", "barco", "besos", "bicho",
    "bocan", "borde", "breve", "bruto", "cacer", "cabro", "caelo", "calor", "calas", "camas",
    "canal", "carne", "celos", "cenar", "chaos", "chico", "chico", "clavo", "corte", "corte",
    "cubos", "darle", "decir", "denso", "dolar", "dudor", "duran", "ecuar", "efect", "ejezo",
    "eligi", "elito", "enter", "fango", "faros", "fator", "feliz", "fiesta", "floja", "fondo",
    "fuego", "ganar", "ganas", "garra", "gente", "globo", "grano", "grito", "habla", "hacia",
    "hacha", "hielo", "hilos", "horas", "humor", "humos", "igual", "jugar", "juvio", "kilos",
    "largo", "lavar", "letra", "licor", "linda", "luzar", "malas", "mango", "march", "marzo",
    "media", "melas", "mismo", "monta", "mujer", "nacer", "naves", "negar", "neuma", "nivel",
    "nubes", "nunca", "ocupa", "ofrer", "ojera", "opaco", "orito", "pacta", "pagar", "pegar",
    "perra", "peque", "picor", "plena", "poder", "polla", "punto", "quema", "quero", "quien",
    "quiza", "radio", "razas", "rebel", "roble", "roque", "salas", "salto", "santo", "sello",
    "silva", "socio", "somos", "sordo", "suele", "tarde", "tiempo", "tinta", "topes", "tribu",
    "tumor", "ubica", "ufano", "ulcer", "unido", "valle", "vario", "veras", "vigor", "voces",
    "votar", "yacer", "yogur", "zorro", "abano", "abaro", "abono", "acelo", "aforo", "aguar",
    "ajeno", "ajuar", "alato", "alelo", "almas", "alaro", "albas", "aliso", "altao", "aludo",
    "amigo", "andar", "apoco", "apolo", "aroma", "aroma", "asilo", "asuma", "ataca", "bacas",
    "bache", "banco", "banda", "barco", "barro", "bazar", "beber", "bicho", "bingo", "bocad",
    "borde", "braco", "brava", "brisa", "bueno", "cabro", "cacao", "cadao", "caldo", "calas",
    "calor", "camas", "canas", "carne", "carro", "casas", "causa", "cebra", "celos", "cenar",
    "chaco", "chaos", "checo", "chico", "chino", "choca", "chule", "cielo", "clavo", "cobro",
    "colas", "collo", "corre", "corte", "costa", "cubos", "cuero", "dango", "darte", "dedos",
    "dejar", "dejar", "denso", "difas", "dolar", "ducha", "echar", "edito", "efect", "eligi",
    "elevo", "enelo", "envio", "epoca", "escas", "esmas", "estre", "feliz", "firme", "flore",
    "fuego", "ganas", "garra", "gente", "globo", "grano", "guapa", "habla", "hacia", "hacha",
    "hielo", "hilos", "hombre", "horas", "humor", "humor", "igual", "jugar", "juvio", "kilos",
    "largo", "linda", "llama", "logra", "lucir", "madre", "malas", "mando", "marca", "media",
    "mejor", "mejor", "mismo", "monta", "mujer", "nacer", "naves", "nunca", "ocupa", "opaco",
    "orito", "pacto", "pagar", "pegar", "picor", "plena", "poder", "polla", "punto", "quema",
    "quero", "quien", "quiza", "radio", "razas", "rebel", "roble", "roque", "salas", "salto",
    "santo", "sello", "silva", "socio", "somos", "sordo", "suele", "tarde", "tiempo", "tinta",
    "topes", "tribu", "tumor", "ubica", "ufano", "ulcer", "unido", "valle", "vario", "veras",
    "vigor", "voces", "votar", "yacer", "yogur", "zorro",
    "abandon", "abogado", "abrazar", "abrumar", "acertar",
    "acertijo", "aceptar", "acordar", "acuario", "admirar",
    "adolescente", "afirmar", "agresivo", "alabanza", "alergia",
    "análisis", "anterior", "antigua", "apasionado", "apetito",
    "arcoíris", "artículo", "asustar", "asustado", "atender",
    "aterrado", "atento", "auditorio", "autorizar", "automático",
    "aventura", "balacera", "barómetro", "batallón", "biblioteca",
    "bilingüe", "carnaval", "castillo", "celebrar", "cercano",
    "cocinero", "cohesión", "comedia", "correría", "despertar",
    "dificultad", "diligente", "emoción", "especial", "espectro",
    "estímulo", "felicidad", "generoso", "hermoso", "informar",
    "intensidad", "interesar", "intervención", "juguetes", "librería",
    "maravilla", "motociclo", "navegante", "nervioso", "ocurrir",
    "participar", "patinaje", "razonable", "reacción", "reclamar",
    "sabiduría", "sorprender", "suspenso", "trabajar", "universo"
];

let haGanado = false;
const Letras = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
let palabraAAdivinar = palabras[Math.floor(Math.random() * palabras.length)];

console.log(palabraAAdivinar);

let lengthPalabras = 6;
if (palabraAAdivinar.length > 5) {
    lengthPalabras += (palabraAAdivinar.length - 5);
}

crearTablero(lengthPalabras, palabraAAdivinar.length);

let arrayLetrasEscritas = [];
for (let i = 0; i < lengthPalabras; i++) {
    let filas = [];
    arrayLetrasEscritas.push(filas);
}

let celdas = document.querySelectorAll('.celda');
let fila = 0;
let letraActual = 0;

document.addEventListener('keydown', function (event) {
    let array = arrayLetrasEscritas[fila];
    if (!haGanado) {
        if (Letras.includes(event.key)) {
            if (array.length < palabraAAdivinar.length) {
                array.push(event.key);
                console.log(event.key);
                arrayLetrasEscritas[fila] = array;
                MostrarFila(fila);
                letraActual++;
            }
        }
        if (event.key === 'Enter') {
            if (array.length === palabraAAdivinar.length) {
                let palabra = arrayLetrasEscritas[fila].join("");
                comprobarPalabra(palabra, palabraAAdivinar);
            }
        }
        if (event.key === 'Backspace') {
            if (array.length > 0) {
                array.pop();
                arrayLetrasEscritas[fila] = array;
                MostrarFila(fila);
                letraActual--;
            }
        }
    }
});

function comprobarPalabra(palabra, palabraAAdivinar) {
    if (palabra === palabraAAdivinar) {
        for (let index = 0; index < palabraAAdivinar.length; index++) {
            const celda = celdas[fila * palabraAAdivinar.length + index];
            celda.classList.add('verde');
            pintarTecladoVirtual(palabraAAdivinar[index], 'verde');
        }
        haGanado = true;
    } else {
        for (let index = 0; index < palabraAAdivinar.length; index++) {
            const celda = celdas[fila * palabraAAdivinar.length + index];
            if (palabraAAdivinar[index] === palabra[index]) {
                celda.classList.add('verde');
                pintarTecladoVirtual(palabra[index], 'verde');
            } else if (palabraAAdivinar.includes(palabra[index]) && palabra[index].length === 1) {
                celda.classList.add('amarillo');
                pintarTecladoVirtual(palabra[index], 'amarillo');
            } else {
                celda.classList.add('gris');
                pintarTecladoVirtual(palabra[index], 'gris');
            }
        }
        fila++;
    }
}

function MostrarFila(fila) {
    // Obtiene las letras de la fila actual
    const letrasFila = arrayLetrasEscritas[fila];

    // las celdas de cada fila
    for (let index = 0; index < palabraAAdivinar.length; index++) {
        const celda = celdas[fila * palabraAAdivinar.length + index];
        // Mostrar el texto
        if (letrasFila[index]) {
            celda.textContent = letrasFila[index];
        } else {
            celda.textContent = '';
        }
    }
    console.log(letraActual);
    const celdaEliminar = celdas[letraActual];
    celdaEliminar.classList.remove('blink');
    
    const celda = celdas[letraActual + 1];
    celda.classList.add('blink');
}

// teclado virtual
document.querySelectorAll('.tecla').forEach(tecla => {
    tecla.addEventListener('click', function () {
        let array = arrayLetrasEscritas[fila];
        let letra = this.textContent.toLowerCase();
        if (!haGanado) {
            if (Letras.includes(letra)) {
                if (array.length < palabraAAdivinar.length) {
                    array.push(letra);
                    arrayLetrasEscritas[fila] = array;
                    MostrarFila(fila);
                    letraActual++;
                }
            }
            if (letra == "enter") {
                if (array.length === palabraAAdivinar.length) {
                    let palabra = arrayLetrasEscritas[fila].join("");
                    comprobarPalabra(palabra, palabraAAdivinar);
                }
            }

            if (letra === "delete") {
                if (array.length > 0) {
                    array.pop();
                    arrayLetrasEscritas[fila] = array;
                    MostrarFila(fila);
                    letraActual-- ;
                }
            }
        }
    });
});

tiempo_jugando = 0;
setInterval(() => {
    if (!haGanado) {
        tiempo_jugando++;
        let minutos = Math.floor(tiempo_jugando / 60);
        let segundos = tiempo_jugando % 60;
        document.getElementById('tiempo-jugando').textContent = `${minutos}:${segundos < 10 ? '0' : ''}${segundos}`;
    }
}, 1000);


function crearTablero(filas, celdasPorFila) {
    const cuadrícula = document.querySelector('.cuadrícula');

    cuadrícula.style.gridTemplateRows = `repeat(${filas}, 60px)`;
    cuadrícula.style.gridTemplateColumns = `repeat(${celdasPorFila}, 60px)`;

    cuadrícula.innerHTML = '';

    for (let j = 0; j < filas; j++) {
        const fila = document.createElement('div');
        fila.classList.add('fila');

        for (let i = 0; i < celdasPorFila; i++) {
            const celda = document.createElement('div');
            celda.classList.add('celda');
            if (j === 0 && i === 0) {
                celda.classList.add('blink');
            }
            fila.appendChild(celda);
        }
        cuadrícula.appendChild(fila);
    }
}

function pintarTecladoVirtual(letra, color) {
    const teclas = document.querySelectorAll('.tecla');
    teclas.forEach(tecla => {
        if (tecla.textContent.toLocaleLowerCase() === letra.toLocaleLowerCase()) {
            console.log(tecla);
            tecla.classList.add(color);
        }
    });
}