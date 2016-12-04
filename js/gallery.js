function iruzkinaBalidatu(f){
    var iruzkina = f.iruzkina.value;
    if(iruzkina==''){
        alert("Iruzkina hutsik dago");
        return false;
    }
    else{
        return true;
    }
}

function iruzkin_osoa(idi, id) {
    var xhr;
    if (XMLHttpRequest) {
        xhr = new XMLHttpRequest();
    }
    else {
        xhr = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xhr.open('GET', 'iruzkin_osoa.php?idi='+idi+'&id='+id, true);
    xhr.onreadystatechange = function()
    {
        if(xhr.readyState == 4 && xhr.status == 200)
            document.getElementById(idi).innerHTML = xhr.responseText;
    }
    xhr.send('');
}
