<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="eu">
<head>
    <meta content="text/html" charset="UTF-8" />
    <title>Alolagram</title>
    <link rel="shortcut icon" type="image/x-icon" href="../resources/img/favicon.ico"/>
    <link rel="stylesheet" href="../css/gallery.css" type="text/css"/>
    <script type="text/javascript" src="../js/gallery.js"></script>
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
        $MAX_IRUZKIN = 100;

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
        global $MAX_IRUZKIN;
        echo "<div class='iruzkinak'>";

        foreach ($db->children() as $elem) {
            global $id;
            echo "<div class='iruzkina'>";
            $idi = $elem["id"];
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
            echo "<div class='iruzkina_text_gorputza' id='$idi'>";
            if (strlen($iruzkina) <= $MAX_IRUZKIN) {
                echo "$iruzkina";
            }else{
                echo(substr($iruzkina,0,$MAX_IRUZKIN).'... <a href="javascript:iruzkin_osoa(\''.$idi.'\',\''.$id.'\');" class="gehiago">[Iruzkin osoa irakurri]</a>');
            }
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

    <div id="validator">
        <a href="http://validator.w3.org/check?uri=referer">
            <img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" id="html" height="31" width="88" />
        </a>
        <a href="http://jigsaw.w3.org/css-validator/check/referer">
            <img src="http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="¡CSS Válido!" id="css" height="31" width="88"/>
        </a>
    </div>

</body>
</html>
