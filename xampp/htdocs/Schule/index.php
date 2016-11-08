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
}
// Wurde das Daten ausgefuellt ?
$sent = isset($_POST['sent']) ? $_POST['sent'] : '';
$suche = isset($_POST['suchstring']) ? $_POST['suchstring'] : '';
$vorname = isset($_POST['vorname']) ? $_POST['vorname'] : '';
$nachname = isset($_POST['nachname']) ? $_POST['nachname'] : '';
$name = isset($_POST['namen']) ? $_POST['namen'] : '';
$schulklasse_id = isset($_POST['schulklasse']) ? $_POST['schulklasse'] : '';
$aendern = isset($_POST['aendern']) ? $_POST['aendern'] : '';

//Neue Klasse eingegeben
if ($sent && $name) {
    Schulklasse::insert(new Schulklasse($name));
    $view = 'klassenAnzeigen';
}

//Neue Schüler Form ausgefüllt?
if ($sent && $vorname && $nachname) {
    Schueler::insert(new Schueler($vorname, $nachname, $schulklasse_id, NULL));
}

echo $aendern;
//Schüler Eintrag ändern?
//if ($aendern) {
//    $view = 'schuelerAendern';
//    
//    Schueler::insert(new Schueler($vorname, $nachname, $schulklasse_id, NULL));
//}

//Suchformular ausgefüllt?
if ($sent && $vorname || $sent && $nachname || $sent && $name) {
    Schueler::getByLikeness($suche);
}



include './view/' . $view . '.php';
include 'view/ende.php';
