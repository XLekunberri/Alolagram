<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Alolagram</title>
    <link rel="shortcut icon" type="image/x-icon" href="resources/img/favicon.ico"/>
    <link rel="stylesheet" href="erregistratu.css" type="text/css"/>
    <script type="text/javascript" src="erregistratu.js"></script>
</head>
<body>
    <?php
    $DATU_BASEA='resources/erabiltzaileak.xml';
    $dena_ondo = false;

    if(libre_dago($_POST['izena'])) {
        $erabiltzaile_guztiak = simplexml_load_file($DATU_BASEA);

        $erabiltzaile_hau = $erabiltzaile_guztiak->addChild('erabiltzailea');
        $erabiltzaile_hau->addChild('izena', $_POST['izena']);
        $erabiltzaile_hau->addChild('pasahitza', $_POST['pasahitza']);

        $erabiltzaile_guztiak->asXML($DATU_BASEA);

        $domxml = new DOMDocument('1.0');
        $domxml->preserveWhiteSpace = false;
        $domxml->formatOutput = true;
        /* @var $xml SimpleXMLElement */
        $domxml->loadXML($erabiltzaile_guztiak->asXML());
        $domxml->save($DATU_BASEA);

        $dena_ondo = true;
    }

    function libre_dago($erabiltzailea){
        global $DATU_BASEA;

        $erabiltzaile_guztiak = simplexml_load_file($DATU_BASEA);
        $libre = true;

        foreach ($erabiltzaile_guztiak->children() as $erabiltzaile_bat){
            if (($erabiltzaile_bat->izena) == $erabiltzailea) {
                $libre = false;
            }
        }

        return($libre);
    }

    if($dena_ondo){
        echo "<div class=\"multzoa\">";
        echo " <h1 id=\"izenburua\">Alolagram</h1>";
        echo "<form action=\"erregistratu.php\" method=\"post\">";
        echo "<input type=\"text\" class=\"bete\" name=\"izena\" placeholder=\"Erabiltzailea\"/><br/><br/>";
        echo "<input type=\"password\" class=\"bete\" name=\"pasahitza\" placeholder=\"Pasahitza\"/><br/><br/>";
        echo "<input type=\"password\" class=\"bete\" name=\"pasahitza_2\" placeholder=\"Pasahitza egiaztatu\"/><br/><br/>";
        echo " <input type=\"checkbox\" id=\"onartu\" onchange=\"botoia();\"></input><label for=\"onartu\">Erabiltzeko baldintzak onartzen ditut.</label><br/><br/>";
        echo "<button type=\"submit\" id=\"bidali\" disabled=\"true\" onclick=\"return erregistratu(this.form);\">Erregistratu</button>";
        echo "</form>";
        echo "</div>";
        echo "<script type='text/javascript'>alert('Zure erabiltzailea sortu da.');</script>";
    }else{
        echo "<div class=\"multzoa\">";
        echo " <h1 id=\"izenburua\">Alolagram</h1>";
        echo "<form action=\"erregistratu.php\" method=\"post\">";
        echo "<input type=\"text\" class=\"bete\" name=\"izena\" placeholder=\"Erabiltzailea\"/><br/><br/>";
        echo "<input type=\"password\" class=\"bete\" name=\"pasahitza\" placeholder=\"Pasahitza\"/><br/><br/>";
        echo "<input type=\"password\" class=\"bete\" name=\"pasahitza_2\" placeholder=\"Pasahitza egiaztatu\"/><br/><br/>";
        echo " <input type=\"checkbox\" id=\"onartu\" onchange=\"botoia();\"></input><label for=\"onartu\">Erabiltzeko baldintzak onartzen ditut.</label><br/><br/>";
        echo "<button type=\"submit\" id=\"bidali\" disabled=\"true\" onclick=\"return erregistratu(this.form);\">Erregistratu</button>";
        echo "</form>";
        echo "</div>";
        echo "<script type='text/javascript'>alert('Erabiltzaile hori hartuta dago dagoeneko.');</script>";
    }


    ?>
</body>
</html>
