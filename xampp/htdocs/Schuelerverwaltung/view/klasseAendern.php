<?php
$id = isset($_GET['aendern']) ? $_GET['aendern'] : '';

echo 'id'.$id;

$schule = Schulklasse::getById($id);

$name = $schule->getName();
//$klassen_ID = $schule->getId();

//$schueler = Schueler::getById($id);
//
//$vorname = $schueler->getVorname();
//$nachname = $schueler->getNachname();
//$klassen_ID = $schueler->getSchulklasse_id();

//echo 'ID: ' . $id;
//echo 'Vorname: ' . $vorname;
//echo 'Nachname: ' . $nachname;
//echo 'Schulklasse: '.$klassen_ID;
echo "
<section id='content'>
    <article>
        <header>
            <h1>Klassen ändern</h1>
            
            <form action='index.php' method='POST'>
                <table border='0' cellpadding='5' cellspacing='10' >
                    <tbody>
                        <div id='textfelder'>
                            <tr>
                                <td>Klassenname</td>
                                <td><input type='text' name='namen' value='$name' size='30' /></td>
                            </tr>
                        <tr>
                            <td><input type='submit' value='Speichern' /></td>
                            <td><input type='hidden' name='update_klasse' value='$id' /></td>
                        </tr>
                    </tbody>
                </table>
            </form>

        </header>
    </article>
</section>";