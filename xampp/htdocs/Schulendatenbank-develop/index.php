<?php

include './config.php';
spl_autoload_register(function($class) { //automatisches einbinden vom Klassen!
    try {
        include './class/' . $class . '.php';
    } catch (Exception $exc) {
        echo $exc->getTraceAsString();
    }
});

$navigation = isset($_GET['navi']) ? $_GET['navi'] : '0';
$view = 'standard';

include 'view/begin.php';
switch ($navigation) {
    case "0":
        $view = 'schuelerNeu';
        break;
    case "1":
        $view = 'schuelerAnzeigen';
        break;
    case "2":
        $view = 'sucheEmpty';
        break;
    case "3":
        $view = 'klassenNeu';
        break;
    case "4":
        $view = 'klassenAnzeigen';
        break;
    case "5":
        $view = 'schuelerAendern';
        break;
    case "6":
        $view = 'klasseAendern';
        break;
}
// Wurde das Daten ausgefuellt ?
$sent = isset($_POST['sent']) ? $_POST['sent'] : '';
$suche = isset($_POST['suchstring']) ? $_POST['suchstring'] : '';
$vorname = isset($_POST['vorname']) ? $_POST['vorname'] : '';
$nachname = isset($_POST['nachname']) ? $_POST['nachname'] : '';
$name = isset($_POST['namen']) ? $_POST['namen'] : '';
$schulklasse_id = isset($_POST['schulklasse']) ? $_POST['schulklasse'] : '';
$update_schueler = isset($_POST['update_schueler']) ? $_POST['update_schueler'] : '';
$update_klasse = isset($_POST['update_klasse']) ? $_POST['update_klasse'] : '';

//Neue Klasse eingegeben
if ($sent && $name) {
    Schulklasse::insert(new Schulklasse($name));
    $view = 'klassenAnzeigen';
}

//Neue Schüler Form ausgefüllt?
if ($sent && $vorname && $nachname) {
    Schueler::insert(new Schueler($vorname, $nachname, $schulklasse_id, NULL));
    $view = 'schuelerAnzeigen';
}

//test

//Schüler Eintrag ändern?
if ($update_schueler) {
    Schueler::update(new Schueler($vorname, $nachname, $schulklasse_id, $update_schueler));
    $view = 'schuelerAnzeigen';
}

//Klasse Eintrag ändern?
if ($update_klasse) {
    Schulklasse::update($update_klasse);
    $view = 'klassenAnzeigen';
}

//Suchformular ausgefüllt?
if ($sent && $vorname || $sent && $nachname || $sent && $name) {
    Schueler::getByLikeness($suche);
}



include './view/' . $view . '.php';
include './view/ende.php';
