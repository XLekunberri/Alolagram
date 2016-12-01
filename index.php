<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
    <title>Alolagram</title>
    <link rel="shortcut icon" type="image/x-icon" href="resources/img/favicon.ico"/>
    <link rel="stylesheet" href="index.css" type="text/css"/>
    <script type="text/javascript" src="index.js"></script>
</head>
<body>
    <?php

    $DATU_BASEA='resources/erabiltzaileak.xml';

    $erabiltzailea = $_POST["izena"];
    $pasahitza = $_POST["pasahitza"];

    $zuzena = false;

    //BUSCAR EL USUARIO DENTRO DE LA DATUBASE

    if($zuzena){
        header("Location: /alola.html");
        die();
    }
    else{
        echo "<div class=\"multzoa\">";
        echo "<h1 id=\"izenburua\">Alolagram</h1>";
        echo "<form action=\"index.php\" method=\"post\">";
        echo "<input type=\"text\" name=\"izena\" placeholder=\"Erabiltzailea\"/><br/><br/>";
        echo "<input type=\"password\" name=\"pasahitza\" placeholder=\"Pasahitza\"/><br/><br/>";
        echo "<button type=\"submit\"  onclick=\"return logeatu(this.form);\">Sartu</button><br/><br/>";
        echo "<a href=\"erregistratu.html\">Erregistratu</a>";
        echo "</form>";
        echo "</div>";
        echo "<script type='text/javascript'>alert('Erabiltzailea edo pasahitza ez da zuzena');</script>";
    }
    ?>
</body>
</html>

