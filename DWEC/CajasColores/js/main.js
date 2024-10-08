/*
    Pon aquí las funciones que cambian la forma de los cuadrados a círculos.
*/

function circulo(elemento) {
    elemento.classList.toggle("circulo");
    elemento.classList.remove("sombra");
}

function sombra(elemento) {
    elemento.classList.add("sombra");
}
function sombraInt(elemento){
    elemento.classList.toggle("sombraInt");
}
function eliminar(elemento) {
    //elemento.parentNode.parentNode.removeChild(elemento.parentNode);
    elemento.parentElement.remove();
}