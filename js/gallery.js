function iruzkinaBalidatu(f){
    var checkbox = document.getElementById("onartu").checked;
    var botoia = document.getElementById("bidali");
    if(checkbox){
        botoia.disabled = false;
    }
    else{
        botoia.disabled = true;
    }
}

function erregistratu(f){
    var erabiltzailea = f.izena.value;
    var pasahitza = f.pasahitza.value;
    var pasahitza_2 = f.pasahitza_2.value;

    var errorea = "";

    if (erabiltzailea == "") {
        errorea += " - Erabiltzailea eremua bete behar duzu.\n";
    }
    if (pasahitza == "") {
        errorea += " - Iruzkina eremua bete behar duzu.\n";
    }
    if (pasahitza != pasahitza_2){
        errorea += " - Sartutako pasahitza ez da berdina.\n";
    }
    if (errorea != "") {
        alert("Formularioa ez duzu ondo bete:\n" + errorea);
        return false;
    }
    else {
        return true;
    }
}