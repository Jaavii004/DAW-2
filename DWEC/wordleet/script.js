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
    "vigor", "voces", "votar", "yacer", "yogur", "zorro"
];

const Letras = ['a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z'];
let palabraAAdivinar = palabras[Math.floor(Math.random() * palabras.length)];

console.log(palabraAAdivinar);
let arrayLetrasEscritas = [];
for (let i = 0; i < 6; i++) {
    let newArray = [];
    arrayLetrasEscritas.push(newArray);
}

let celdas = document.querySelectorAll('.celda');
let fila = 0;

document.addEventListener('keydown', function(event) {
    let array = arrayLetrasEscritas[fila];
    
    if (Letras.includes(event.key)) {
        if (array.length <= 4) {
            array.push(event.key);
            console.log(event.key);
            arrayLetrasEscritas[fila] = array;
            MostrarFila(fila);
        }
    }
    if (event.key === 'Enter') {
        if (array.length === 5) {
            let palabra = arrayLetrasEscritas[fila].join("");
            comprobarPalabra(palabra, palabraAAdivinar);
        }
    }
    if (event.key === 'Backspace') {
        if (array.length > 0) {
            array.pop();
            arrayLetrasEscritas[fila] = array;
            MostrarFila(fila);
        }
    }
});

function comprobarPalabra(palabra , palabraAAdivinar) {
    if (palabra === palabraAAdivinar) {
        for (let index = 0; index < 5; index++) {
            const celda = celdas[fila * 5 + index];
            celda.classList.add('verde');
        }
    } else {    
        for (let index = 0; index < 5; index++) {
            const celda = celdas[fila * 5 + index];
            if (palabraAAdivinar[index] === palabra[index]) {
                celda.classList.add('verde');
            } else if (palabraAAdivinar.includes(palabra[index]) && palabra[index].length === 1) {
                celda.classList.add('amarillo');
            } else {
                celda.classList.add('gris');
            }
        }
        fila++;
    }
}

function MostrarFila(fila) {
    // Obtiene las letras de la fila actual
    const letrasFila = arrayLetrasEscritas[fila];
    eliminarClaseBlink();

    // las celdas de cada fila
    for (let index = 0; index < 5; index++) {
        const celda = celdas[fila * 5 + index];
        // Mostrar el texto
        if (letrasFila[index]) {
            celda.textContent = letrasFila[index];
        } else {
            celda.textContent = '';
        }
    }
    
    // Encuentra la primera celda vacía después de la última letra escrita
    for (let index = 0; index < 5; index++) {
        const celda = celdas[fila * 5 + index];
        if (celda.textContent === '') {
            if (index > 0 && celdas[fila * 5 + index - 1].textContent !== '') {
                // Añade la clase blink a la siguiente celda vacía
                celda.classList.add('blink');
                index = 6;
            }
        }
    }
}

// Añadir la funcion de la tecla del teclado virtual
document.querySelectorAll('.tecla').forEach(tecla => {
    tecla.addEventListener('click', function() {
        let array = arrayLetrasEscritas[fila];
        let letra = this.textContent.toLowerCase();
        
        if (Letras.includes(letra)) {
            if (array.length <= 4) {
                array.push(letra);
                arrayLetrasEscritas[fila] = array;
                MostrarFila(fila);
            }
        }

        if (letra == "enter") {
            if (array.length === 5) {
                let palabra = arrayLetrasEscritas[fila].join("");
                comprobarPalabra(palabra, palabraAAdivinar);
            }
        }

        if (letra === "delete") {
            if (array.length > 0) {
                array.pop();
                arrayLetrasEscritas[fila] = array;
                MostrarFila(fila);
            }
        }
    });
});

function eliminarClaseBlink() {
    // Selecciona todos los elementos con la clase 'blink'
    const celdasConBlink = document.querySelectorAll('.blink');
    
    // Itera a través de los elementos y elimina la clase
    celdasConBlink.forEach(celda => {
        celda.classList.remove('blink');
    });
}