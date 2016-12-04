<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Alolagram</title>
    <link rel="shortcut icon" type="image/x-icon" href="../resources/img/favicon.ico"/>
    <link rel="stylesheet" href="../css/gallery.css" type="text/css"/>
    <script type="text/javascript" src="../css/gallery.js"></script>
</head>
<body>
    <?php
    session_start();
    if(!isset($_SESSION['erabiltzailea'])){
        echo "<script type='text/javascript'>window.location = \"login.php\";</script>";
    }
    elseif(!isset($_GET['id']) || $_GET['id'] > "5"){
        echo "<script type='text/javascript'>window.location = \"alola.php\";</script>";
    }
    else {
        $id = $_GET['id'];
        $erabiltzailea = $_SESSION['erabiltzailea'];
        $iruzkinak = simplexml_load_file("../xml/gallery/$id.xml");

        echo "<div id=\"marco\">";

        echo "<img src='../resources/img/gallery/$id.png' id=\"argazkia\" width='400' height='240'>";

        echo "<a href=\"alola.php\"><img src='../resources/img/gallery/x.png' id=\"x\" width='32' height='32'></a>";

        testuaGehitu($id);

        infoGehitu($id);

        echo "</div>";
    }

    function testuaGehitu($id)
    {
        echo "<div class='tabloia'>";

        global $iruzkinak;

        //Idazlea gehitu
        idazleaGehitu($iruzkinak);

        echo "<hr/>";

        //Pertsonen iruzkinak gehitu
        iruzkinakGehitu($iruzkinak);

        //Iruzkinak idazteko tokia gehitu
        textfieldGehitu($id);

        echo "</div>";
    }

    function idazleaGehitu($db)
    {
        echo "<div class='egilea'>";

        $izena = $db['izena'];
        $irudia = $db['irudia'];
        $data = $db['data'];
        $iruzkina = $db['iruzkina'];
        echo "<div class='egilea_avatar'>";
        echo "<img src=\"../resources/img/avatars/$irudia.png\"/>";
        echo "</div>";
        echo "<div class='egilea_text'>";
        echo "<div class='egilea_text_burua'>";
        echo "$izena";
        echo " - $data</br>";
        echo "</div>";
        echo "<div class='egilea_text_gorputza'>";
        echo "$iruzkina";
        echo "</div>";
        echo "</div>";

        echo "</div>";
    }

    function iruzkinakGehitu($db)
    {

        echo "<div class='iruzkinak'>";

        foreach ($db->children() as $elem) {
            echo "<div class='iruzkina'>";
            $izena = $elem->izena;
            $irudia = $elem->irudia;
            $data = $elem->data;
            $iruzkina = htmlspecialchars($elem->iruzkina);


            echo "<div class='avatar'>";
            echo "<img src=\"../resources/img/avatars/$irudia.png\"/>";
            echo "</div>";
            echo "<div class='iruzkina_text'>";
            echo "<div class='iruzkina_text_burua'>";
            echo "$izena";
            echo " - $data</br>";
            echo "</div>";
            echo "<div class='iruzkina_text_gorputza'>";
            echo "$iruzkina";
            echo "</div>";
            echo "</div>";

            echo "</div>";
            echo "<hr/>";
        }

        echo "</div>";
    }

    function textfieldGehitu($id){
        echo "<div class='idazteko'>";
        echo "<form action=\"iruzkinaGorde.php\" method=\"post\">";
        echo "<input type=\"hidden\" name=\"id\" value=\"$id\">";
        echo "<textarea name=\"iruzkina\" placeholder=\"Idatz ezazu zure iruzkina hemen\"></textarea><br>";
        echo "<button type=\"submit\"  onclick=\"return iruzkinaBalidatu(this.form);\">Bidali</button>";
        echo "</form>";
        echo "</div>";
    }

    function infoGehitu($id){

        $pokedex = simplexml_load_file("../xml/gallery/pokedex.xml");

        foreach ($pokedex->children() as $pokemon) {
            if($pokemon["id"]=="$id"){
                $n = $pokemon->n;
                $izena = $pokemon->izena;
                $pisua = $pokemon->pisua;
                $altuera = $pokemon->altuera;
                $tipo1 = $pokemon->tipo1;
                $tipo2 = $pokemon->tipo2;
            }
        }

        echo "<div class='info'>";
        echo "<img src='../resources/img/gallery/$id.gif' id=\"gif\">";
        echo "<div class=\"n\">Nº $n</div>";
        echo "<div class=\"izena\">$izena</div>";
        echo "<div class=\"pisua\">$pisua</div>";
        echo "<div class=\"altuera\">$altuera</div>";
        echo "<div class=\"tipo1\"><img src=\"../resources/img/gallery/types/$tipo1.png\"</div>";
        if($tipo2 != "") {
            echo "<div class=\"tipo2\"><img src=\" ../resources/img/gallery/types/$tipo2.png\"</div>";
        }
        else{
            echo "<div class=\"tipo2\"><img src=\" ../resources/img/gallery/types/notype.png\"</div>";
        }
        echo "</div>";
    }
    ?>
</body>
</html>
