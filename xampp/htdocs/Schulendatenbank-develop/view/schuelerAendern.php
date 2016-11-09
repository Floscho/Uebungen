<?php
$schule = Schulklasse::getAll();
$id = isset($_GET['aendern']) ? $_GET['aendern'] : '';
$schueler = Schueler::getById($id);

$vorname = $schueler->getVorname();
$nachname = $schueler->getNachname();
$klassen_ID = $schueler->getSchulklasse_id();

//echo 'ID: ' . $id;
//echo 'Vorname: ' . $vorname;
//echo 'Nachname: ' . $nachname;
//echo 'Schulklasse: '.$klassen_ID;
echo "
<section id='content'>
    <article>
        <header>
            <h1>Schüler ändern</h1>

            <table border='0' cellpadding='5' cellspacing='10' >
                <tbody>
                <form action='index.php' method='POST'>
                    <div id='textfelder'>
                        <tr>
                            <td>Vorname</td>
                            <td><input type='text' name='vorname' value=$vorname size='30' /></td>
                        </tr>
                        <tr>
                            <td>Nachname</td>
                            <td><input type='text' name='nachname' value=$nachname size='30' /></td>
                        </tr>
                    </div>
                    <tr>
                        <td>Schulklasse</td>
                        <td><select name='schulklasse'>
                                "; echo SchulklasseHTML::buildDropdown($schule)."
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type='submit' value='Speichern' /></td>
                        <td><input type='reset' value='reset' /></td>
                        <td><input type='hidden' name='update' value=$id /></td>
                    </tr>
                </form>
                </tbody>
            </table>

        </header>
    </article>
</section>";
