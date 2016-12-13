<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Alolagram</title>
    <link rel="shortcut icon" type="image/x-icon" href="../resources/img/favicon.ico"/>
    <link rel="stylesheet" href="../css/erregistratu.css" type="text/css"/>
    <script type="text/javascript" src="../js/erregistratu.js"></script>
</head>
<body>
<div class="multzoa">
     <h1 id="izenburua">Alolagram</h1>
    <form action="erregistratu.php" method="post">
        <input type="text" class="bete" name="izena" placeholder="Erabiltzailea"/><br/><br/>
        <input type="password" class="bete" name="pasahitza" placeholder="Pasahitza"/><br/><br/>
        <input type="password" class="bete" name="pasahitza_2" placeholder="Pasahitza egiaztatu"/><br/><br/>
        <input type="checkbox" id="onartu" onchange="botoia();"></input><label for="onartu">Erabiltzeko baldintzak onartzen ditut.</label><br/><br/>
        <button type="submit" id="bidali" disabled="true" onclick="return erregistratu(this.form);">Erregistratu</button>
        </form>
    </div>
<?php

function libre_dago($erabiltzailea){
    global $DATU_BASEA;

    $erabiltzaile_guztiak = simplexml_load_file($DATU_BASEA);
    $libre = true;

    foreach ($erabiltzaile_guztiak->children() as $erabiltzaile_bat) {
        if (($erabiltzaile_bat->izena) == $erabiltzailea) {
            $libre = false;
        }
    }

    return ($libre);
}

if(isset($_POST["izena"]) && isset($_POST["pasahitza"])) {
    $DATU_BASEA = '../xml/erabiltzaileak.xml';
    $dena_ondo = false;

    if (libre_dago($_POST['izena'])) {
        $erabiltzaile_guztiak = simplexml_load_file($DATU_BASEA);

        $erabiltzaile_hau = $erabiltzaile_guztiak->addChild('erabiltzailea');
        $erabiltzaile_hau->addChild('izena', $_POST['izena']);
        $erabiltzaile_hau->addChild('pasahitza', $_POST['pasahitza']);
        $erabiltzaile_hau->addChild('irudia', rand(1,5));

        $erabiltzaile_guztiak->asXML($DATU_BASEA);

        $domxml = new DOMDocument('1.0');
        $domxml->preserveWhiteSpace = false;
        $domxml->formatOutput = true;
        /* @var $xml SimpleXMLElement */
        $domxml->loadXML($erabiltzaile_guztiak->asXML());
        $domxml->save($DATU_BASEA);

        $dena_ondo = true;
    }

    if ($dena_ondo) {
        echo "<script language='JavaScript'> window.alert('Zure erabiltzailea sortu da.');window.location.href='login.php';</script>";
    } else {
        echo "<script type='text/javascript'>alert('Erabiltzaile hori hartuta dago dagoeneko.');</script>";
    }

}
?>
</body>
</html>
