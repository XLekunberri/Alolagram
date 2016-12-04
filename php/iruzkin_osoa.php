<?php
$id = $_GET['id'];
$helbidea = "../xml/gallery/$id.xml";

if(isset($_GET['idi']) && file_exists($helbidea)) {
    $idi=$_GET['idi'];
    $bl=simplexml_load_file($helbidea);
    foreach($bl->iruzkinlaria as $bisita) {
        if($bisita['id'] == $idi)
        {
            echo($bisita->iruzkina);
            break;
        }
    }
}
?>
