<?php

$id=$_POST['id'];
$iruzkina=$_POST['iruzkina'];
$data=date('d/m/Y');

$helbidea = "../xml/gallery/$id.xml";

$iruzkinak = simplexml_load_file($helbidea);
$iruzkinlaria = $iruzkinak->addChild('iruzkinlaria');

$iruzkinlaria->addChild('izena', $_SESSION['izena']);
$iruzkinlaria->addChild('irudia', '1');
$iruzkinlaria->addChild('data', $data);
$iruzkinlaria->addChild('iruzkina', $iruzina);

$iruzkinak->asXML($helbidea);

$domxml = new DOMDocument('1.0');
$domxml->preserveWhiteSpace = false;
$domxml->formatOutput = true;
/* @var $xml SimpleXMLElement */
$domxml->loadXML($iruzkinak->asXML());
$domxml->save($helbidea);

header("Location: ../php/gallery.php?id=$id");

?>