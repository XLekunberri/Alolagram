function boton(){
    var checkbox = document.getElementById("acepto").checked;
    var botoia = document.getElementById("send");
    if(checkbox){
        botoia.disabled = false;
    }
    else{
        botoia.disabled = true;
    }
}