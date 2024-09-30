let display = document.getElementById("display");
let miDisplayArray = [];

function appendDisplay(num) {
    let numact = display.value + num;
    display.value = numact;
    miDisplayArray.push(num);
}

function limpDisplay() {
    display.value = "";
    miDisplayArray = [];
}

function calc() {
    // Hacer la operacion
    console.log(miDisplayArray);
    let miRes = 0;
    let varAnt;
    let queriasHacer = "";
    for (let i = 0; i < miDisplayArray.length; i++) {
        switch (miDisplayArray[i]) {
            case "+":
                miRes += parseInt(varAnt);
                varAnt = undefined;
                queriasHacer = "+";
                break;
            case "-":
                miRes -= parseInt(varAnt);
                varAnt = undefined;
                queriasHacer = "-";
                break;
            case "/":
                miRes = parseInt(varAnt);
                varAnt = undefined;
                queriasHacer = "/";
                break;
            case "*":
                if (miRes == 0) {
                    miRes = 1;
                }
                miRes *= parseInt(varAnt);
                varAnt = undefined;
                queriasHacer = "*";
                break;
            default:
                if (varAnt === undefined) {
                    varAnt = miDisplayArray[i];
                } else {
                    varAnt += miDisplayArray[i];
                }
                break;
        }
    }

    switch (queriasHacer) {
        case "+":
            miRes += parseInt(varAnt);
            break;
        case "-":
            miRes -= parseInt(varAnt);
            break;
        case "/":
            miRes /= parseInt(varAnt);
            break;
        case "*":
            if (miRes == 0) {
                miRes = 1;
            }
            miRes *= parseInt(varAnt);
            break;
        default:
            miRes = varAnt;
            break;
    }
    console.log(miRes);
    
    if (isNaN(miRes)) {
        miRes = "Operacion incorrecta";
    } else {
        miDisplayArray = [miRes];
    }
    display.value = (miRes);
}


// Aprendido con cristian https://gitlab.com/jaavii_04/lighting-designer/-/blob/main/public/js/key-bindings.js?ref_type=heads
document.addEventListener('keydown', function(event) {
    if (event.key === "+") {
        event.preventDefault();
        appendDisplay("+");
    } else if (event.key === '-') {
        event.preventDefault();
        appendDisplay("-");
    } else if (event.key === '/' || event.key.toLowerCase() === '%') {
        event.preventDefault();
        appendDisplay("/");
    } else if (event.key === '*') {
        event.preventDefault();
        appendDisplay("*");
    } else if (event.key === 'Enter') {
        event.preventDefault();
        calc();
    } else if (event.key === 'Escape' || event.key.toLowerCase() === 'c') {
        event.preventDefault();
        limpDisplay();
    }
});
