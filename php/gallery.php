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
    session_start();
    $id = $_GET['id'];
    $erabiltzailea = $_SESSION['erabiltzailea'];

    //Argazkia gehitu
    echo "<img src='../resources/img/gallery/$helbidea$id.png' id=argazkia'>";


    testuaGehitu($id);

    function testuaGehitu($id){


        echo "<div class='testua'>";

        $iruzkinak = simplexml_load_file("../xml/gallery/$id.xml");

        //Idazlea gehitu
        idazleaGehitu($iruzkinak);

        //Pertsonen iruzkinak gehitu
        iruzkinakGehitu($iruzkinak);

        echo "</div>";
    }

    function idazleaGehitu($db){
        echo "<div class='egilea'>";

        $izena = $db['izena'];
        $irudia = $db['irudia'];
        $data = $db['data'];
        $iruzkina = $db['iruzkina'];

        echo "$izena</br>";
        echo "$data</br>";
        echo "$iruzkina";

        echo "</div>";
    }

    function iruzkinakGehitu($db){

        echo "<div class='iruzkinak'>";

        foreach($db->children() as $elem){
            echo "<div class='iruzkina'>";

            $izena = $elem->izena;
            $irudia = $elem->irudia;
            $data = $elem->data;
            $iruzkina = $elem->iruzkina;

            echo "$izena</br>";
            echo "$data</br>";
            echo "$iruzkina";

            echo "</div>";
        }

        echo "</div>";
    }

    ?>
    </div>
</body>
</html>
