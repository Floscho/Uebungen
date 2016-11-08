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

//if("4096" === "0x1000") {
//    echo "JAAAAAAAAAAAAAAA IST GLEICH";
//} else {
//    echo "NEIIIIIIIIIIN, NICHT GLEICH";
//}


//echo $navigation;
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
}//switch
// Wurde das Suchformular ausgefuellt ?
$sent = isset($_POST['sent']) ? $_POST['sent'] : '';
$suche = isset($_POST['suchstring']) ? $_POST['suchstring'] : '';
//echo "Suche nach: $suche $sent";
if ($sent && $suche) {
    $view = 'suchen';
}

// test Übergabevariablen

$insertsent = isset($_POST['insertsent']) ? $_POST['insertsent'] : '';
$name = isset($_POST['name']) ? $_POST['name'] : '';
$vorname = isset($_POST['vorname']) ? $_POST['vorname'] : '';
$nachname = isset($_POST['nachname']) ? $_POST['nachname'] : '';
//echo "$kneipenName $kneipenArt $kneipenNote $kneipenKommentar<br>";
//testen welche post-Variablen übergeben wurden
/* echo '<pre>';
  print_r($_POST);
  echo '</pre>'; */
//php interpretiert '' (leerstring) als false:
if ($insertsent && $kneipenName && $kneipenKommentar) {
    include("view/SchuleAnzeigen.php");
}

include './view/' . $view . '.php';
include 'view/ende.php';
?>