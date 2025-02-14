document.getElementById("openModalBtn").addEventListener("click", function() {
    document.getElementById("pokemonModal").style.display = "flex";
});

document.getElementById("closeModalBtn").addEventListener("click", function() {
    document.getElementById("pokemonModal").style.display = "none";
});

const pokemonImages = [
    "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/1.png", // Bulbasaur
    "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/4.png", // Charmander
    "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/7.png", // Squirtle
    "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/25.png", // Pikachu
];

let currentIndex = 0;

document.getElementById("prevBtn").addEventListener("click", function() {
    currentIndex = (currentIndex === 0) ? pokemonImages.length - 1 : currentIndex - 1;
    document.getElementById("pokemonImage").src = pokemonImages[currentIndex];
});

document.getElementById("nextBtn").addEventListener("click", function() {
    currentIndex = (currentIndex === pokemonImages.length - 1) ? 0 : currentIndex + 1;
    document.getElementById("pokemonImage").src = pokemonImages[currentIndex];
});
