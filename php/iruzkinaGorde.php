<?php
session_start();
$id = $_POST['id'];
$iruzkina = $_POST['iruzkina'];
$data = date('d/m/Y');

$helbidea = "../xml/gallery/$id.xml";


$iruzkinak = simplexml_load_file($helbidea);

$idi = "b" . ((int) substr($iruzkinak['azkenid'], 1) + 1);

$DATU_BASEA = '../xml/erabiltzaileak.xml';

$erabiltzaile_guztiak = simplexml_load_file($DATU_BASEA);
$avatar = 1;
foreach ($erabiltzaile_guztiak->children() as $erabiltzaile_bat) {
    if (($erabiltzaile_bat->izena) == $_SESSION["erabiltzailea"]) {
        $avatar = $erabiltzaile_bat->irudia;
    }
}

$iruzkinlaria = $iruzkinak->addChild('iruzkinlaria');
$iruzkinlaria['id']=$idi;
$iruzkinlaria->addChild('izena', $_SESSION["erabiltzailea"]);
$iruzkinlaria->addChild('irudia', $avatar);
$iruzkinlaria->addChild('data', $data);
$iruzkinlaria->addChild('iruzkina', $iruzkina);

$iruzkinak['azkenid']=$idi;

$iruzkinak->asXML($helbidea);

$domxml = new DOMDocument('1.0');
$domxml->preserveWhiteSpace = false;
$domxml->formatOutput = true;
/* @var $xml SimpleXMLElement */
$domxml->loadXML($iruzkinak->asXML());
$domxml->save($helbidea);

header("Location: ../php/gallery.php?id=$id");
?>