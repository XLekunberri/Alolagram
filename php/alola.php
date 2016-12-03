<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" name="viewport" content="width=device-width, initial-scale=1.0"/>
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
    <img src="../resources/img/alola_map.jpg" width="860" height="480" id="mapa">
    <div class="poke">
        <a href="gallery.php?id=001"><img src="../resources/img/pokeball.png" width="16" height="16" id="poke1"></a>
    </div>
    <div class="poke">
        <a href="gallery.php?id=002"><img src="../resources/img/pokeball.png" width="16" height="16" id="poke2"></a>
    </div>
    <div class="poke">
        <a href="gallery.php?id=003"><img src="../resources/img/pokeball.png" width="16" height="16" id="poke3"></a>
    </div>
    <div class="poke">
        <a href="gallery.php?id=004"><img src="../resources/img/pokeball.png" width="16" height="16" id="poke4"></a>
    </div>
</body>
</html>