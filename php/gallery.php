<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Alolagram</title>
    <link rel="shortcut icon" type="image/x-icon" href="../resources/img/favicon.ico"/>
    <link rel="stylesheet" href="erregistratu.css" type="text/css"/>
    <script type="text/javascript" src="erregistratu.js"></script>
</head>
<body>
    <div class="nagusi">
    <?php
    $id = $_GET['id'];
    $erabiltzailea = $_SESSION['erabiltzailea'];
    $helbidea = '../resources/img/gallery/';

    //Argazkia gehitu
    echo "<img src='$helbidea$id.png' id=argazkia'>";

    iruzkinakGehitu($id, $helbidea);

    function iruzkinakGehitu($id, $helbidea){
        echo '<div class="'.'iruzkinak'.'">';

        //Idazlea gehitu
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

    ?>
    </div>
</body>
</html>
