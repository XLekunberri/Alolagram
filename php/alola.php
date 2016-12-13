<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="eu">
<head>
    <meta http-equiv="content-type" content="text/html" charset="UTF-8"/>
    <title>Alolagram</title>
    <link rel="shortcut icon" type="image/x-icon" href="../resources/img/favicon.ico"/>
    <link rel="stylesheet" href="../css/alola.css" type="text/css"/>
</head>
<body>
    <?php
    session_start();
        if(!isset($_SESSION["erabiltzailea"])) {
            echo "<script type='text/javascript'>window.location = login.php;</script>";
        }
    ?>
    <img src="../resources/img/alola_map.jpg" alt="mapa" width="860" height="480" id="mapa">
    <div class="poke">
        <a href="gallery.php?id=001"><img src="../resources/img/pokeball.png" alt="poke1" width="16" height="16" id="poke1"></a>
    </div>
    <div class="poke">
        <a href="gallery.php?id=002"><img src="../resources/img/pokeball.png" alt="poke2" width="16" height="16" id="poke2"></a>
    </div>
    <div class="poke">
        <a href="gallery.php?id=003"><img src="../resources/img/pokeball.png" alt="poke3" width="16" height="16" id="poke3"></a>
    </div>
    <div class="poke">
        <a href="gallery.php?id=004"><img src="../resources/img/pokeball.png" alt="poke4" width="16" height="16" id="poke4"></a>
    </div>

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