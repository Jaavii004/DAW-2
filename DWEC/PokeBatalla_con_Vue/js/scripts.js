async function ObtenerPokemons() {
    const response = await fetch(`https://pokeapi.co/api/v2/pokemon?limit=151`);
    const data = await response.json();
    let arrayPrimera = [];

    data.results.forEach(async element => {
        // console.log(element.url);
        let response = await fetch(element.url);
        const data = await response.json();
        // let arr = 
        console.log(data.sprites.other.dream_world.front_default);
        arrayPrimera.push(element);
        pokemonImages.push(data.sprites.other.dream_world.front_default);
    });
    console.log(arrayPrimera);

    let currentIndex = 0;

    document.getElementById("prevBtn").addEventListener("click", function() {
        currentIndex = (currentIndex === 0) ? pokemonImages.length - 1 : currentIndex - 1;
        document.getElementById("pokemonImage").src = pokemonImages[currentIndex];
    });

    document.getElementById("nextBtn").addEventListener("click", function() {
        currentIndex = (currentIndex === pokemonImages.length - 1) ? 0 : currentIndex + 1;
        document.getElementById("pokemonImage").src = pokemonImages[currentIndex];
        console.log(pokemonImages[currentIndex]);
    });
}

let pokemonImages = [];

window.onload = function() {
    // Seleccionar los elementos que deseas ocultar
    ObtenerPokemons();
    var elementos = document.querySelectorAll('#cartasPlayer, #cartasMachine,  #cartel, #reportero');

    console.log(pokemonImages);
    // Iterar sobre los elementos seleccionados y agregarles la clase 'ocultar'
    elementos.forEach(function(elemento) {
        elemento.classList.add('ocultar');
    });
};
