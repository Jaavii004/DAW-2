// EL + símbolo significa "uno o más" del conjunto anterior.

function compNombre() {
    let nombre = document.getElementById("nombre");
    // Comprobamos que la primeroa sea mayuscula y que sean todo letras
    const regex = /^[A-Z][a-z\s]+$/;
    if (regex.test(nombre.value)) {
        pintar_acierto(nombre);
        return true;
    } else {
        pintar_error(nombre);
    }
}

function compApellidos() {
    let apellido = document.getElementById("apellidos");
    // Comprobamos que la primeroa sea mayuscula y que sean todo letras
    const regex = /[A-Z][a-z\s]+$/;
    if (regex.test(apellido.value)) {
        pintar_acierto(apellido);
        return true;
    } else {
        pintar_error(apellido);
    }
}

function comp_Dni() {
    let dnit = document.getElementById("dni");
    let dni = dnit.value;
    if (dni.length !== 9) {
        pintar_error(dnit);
    }
    const regex = /^\d{8}[A-Za-z]$/i;
    if (!regex.test(dni)) {
        pintar_error(dnit);
    }
    const letras = 'TRWAGMYFPDXBNJZSQVHLCKE';
    const letra = letras.charAt(parseInt(dni.substr(0, 8)) % 23);
    if (letra === dni.charAt(8).toUpperCase()) {
        pintar_acierto(dnit);
        return true;
    } else {
        pintar_error(dnit);
    }
    return false;
}

function comp_email(email) {
    // Expresión regular para validar un correo electrónico
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    return regex.test(email);
}


function pintar_acierto(input) {
    input.style.color = "green";
    input.style.border = "2px solid green";
}


function pintar_error(input) {
    input.style.color = "red";
    input.style.border = "2px solid red";
}

function ocultarpass(id) {
    let password = document.getElementById(id);
    let hiddenPassword = "";
    for (let i = 0; i < password.value.length; i++) {
        hiddenPassword += "*";
    }
    password.value = hiddenPassword;
    passwordSecure(id);
}

function passwordSecure(id) {
    let password = document.getElementById(id).value;

    if (password.length < 8) {
        pintar_error(document.getElementById(id));
        return;
    }

    let hasUppercase = false;
    let hasLowercase = false;
    let hasNumber = false;
    let hasSpecialChar = false;
    let specialChars = "!@#$%^&*";

    for (let i = 0; i < password.length; i++) {
        let char = password[i];
        if (char >= 'A' && char <= 'Z') {
            hasUppercase = true;
        } else if (char >= 'a' && char <= 'z') {
            hasLowercase = true;
        } else if (char >= '0' && char <= '9') {
            hasNumber = true;
        } else if (specialChars.includes(char)) {
            hasSpecialChar = true;
        }
    }

    if (hasUppercase && hasLowercase && hasNumber && hasSpecialChar) {
        pintar_acierto(document.getElementById(id));
    } else {
        pintar_error(document.getElementById(id));
    }
}


function compEmail() {
    let email = document.getElementById("email");
    // Expresión regular para validar un correo electrónico
    const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
    if (regex.test(email.value)) {
        pintar_acierto(email);
    } else {
        pintar_error(email);
    }
}


function compEsNumero() {
    let numero = document.getElementById("ip_equipo");
    if (!isNaN(numero.value)) {
        pintar_acierto(numero);
    } else {
        pintar_error(numero);
    }
}