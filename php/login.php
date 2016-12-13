<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="eu">
<head>
    <meta http-equiv="content-type" content="text/html" charset=UTF-8" />
    <title>Alolagram</title>
    <link rel="shortcut icon" type="image/x-icon" href="../resources/img/favicon.ico"/>
    <link rel="stylesheet" href="../css/login.css" type="text/css"/>
    <script type="text/javascript" src="../js/login.js"></script>
</head>
<body>
<div class="multzoa">
    <h1 id="izenburua">Alolagram</h1>
    <form action="login.php" method="post">
        <input type="text" name="izena" placeholder="Erabiltzailea"/><br/><br/>
        <input type="password" name="pasahitza" placeholder="Pasahitza"/><br/><br/>
        <button type="submit"  onclick="return logeatu(this.form);">Sartu</button><br/><br/>
    </form>
    <a href="erregistratu.php">Erregistratu</a>
</div>
<?php
if(isset($_POST["izena"]) && isset($_POST["pasahitza"])) {
    $DATU_BASEA = '../xml/erabiltzaileak.xml';

    $erabiltzailea = $_POST["izena"];
    $pasahitza = $_POST["pasahitza"];

    $zuzena = false;
    $avatar = 1;

    $erabiltzaile_guztiak = simplexml_load_file($DATU_BASEA);

    foreach ($erabiltzaile_guztiak->children() as $erabiltzaile_bat) {
        if ((($erabiltzaile_bat->izena) == $erabiltzailea) && (($erabiltzaile_bat->pasahitza) == $pasahitza)) {
            $zuzena = true;
            $avatar = $erabiltzaile_bat->irudia;
        }
    }

    if ($zuzena) {
        session_start();
        $_SESSION["erabiltzailea"] = $erabiltzailea;
        header("Location: alola.php");
        exit();
    }
    else{
        echo "<script type='text/javascript'>alert('Erabiltzailea edo pasahitza ez da zuzena');</script>";
    }
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

