function logeatu(f){
    var izena = f.izena.value;
    var pasahitza = f.pasahitza.value;
    var errorea = "";


    if(izena=="")
        errorea += "\nIzenaren eremua hutsa dago.\n";
    if(pasahitza=="")
        errorea += "\nPasahitzaren eremua hutsa dago.\n";

    if(errorea != "") {
        alert("Formularioa ez duzu ondo bete:\n\n" + errorea);
        return false;
    }
    else
        return true;
}