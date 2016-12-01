<?php

$DATU_BASEA='resources/erabiltzaileak.xml';

if(libre_dago($_POST['izena'])) {
    $erabiltzaile_guztiak = simplexml_load_file($DATU_BASEA);

    $erabiltzaile_hau = $erabiltzaile_guztiak->addChild('izena');
    $erabiltzaile_hau->addChild(izena, $_POST['izena']);
    $erabiltzaile_hau->addChild(pasahitza, $_POST['pasahitza']);

    $erabiltzaile_guztiak->asXML($DATU_BASEA);
}
else{
    alert("Erabiltzaile hori existitzen da.");
}

function libre_dago($erabiltzailea){
    global $DATU_BASEA;

    $erabiltzaile_guztiak = simplexml_load_file($DATU_BASEA);
    $libre = true;

    foreach ($erabiltzaile_guztiak->erabiltzaileak->erabiltzailea['izena'] as $egungoa){
        if($egungoa == $erabiltzailea){
            $libre = false;
        }
    }

    return($libre);
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>