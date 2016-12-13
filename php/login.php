<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
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
</body>
</html>

