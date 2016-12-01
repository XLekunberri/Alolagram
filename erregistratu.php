<?php

$DATU_BASEA='resources/erabiltzaileak.xml';

if(libre_dago($_POST['erabiltzailea'])) {
    $erabiltzaile_guztiak = simplexml_load_file($DATU_BASEA);

    $erabiltzaile_hau = $erabiltzaile_guztiak->addChild('erabiltzailea');
    $erabiltzaile_hau->addChild(izena, $_POST['erabiltzailea']);
    $erabiltzaile_hau->addChild(pasahitza, $_POST['pasahitza']);

    $erabiltzaile_guztiak->asXML($DATU_BASEA);
}
else{
    alert("Erabiltzaile hori existitzen da.");
}

function libre_dago($_POST['erabiltzailea']){
    global $DATU_BASEA;
    $erabiltzaile_guztiak = simplexml_load_file($DATU_BASEA);
    $libre = true;

    foreach ($erabiltzaile_guztiak->erabiltzailea['izena'] as $egungoa){
        if($egungoa == $_POST['erabiltzailea']){
            $libre = false;
        }
    }

    return($libre);
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>