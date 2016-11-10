<?php
$schule = Schueler::getAll();
echo $name;
$schuelerMitKlasseNamen = Schueler::getSuche(Schulklasse::getNameById($name), $vorname, $nachname );
//echo '<pre>';
//print_r($schuelerMitKlasseNamen);
//echo '</pre>';
?>

<section id="content">
    <article>
        <header>
            <h1>Schüler anzeigen</h1>
            <form action="index.php" method="POST">
                <table id="myTable">
                    <thead>
                        <tr>
                            <th>Vorname</th>
                            <th>Nachname</th>
                            <th>Schulklasse</th>
                            <th>
                                <input type="submit" value="Loeschen" name="loeschen" />
                            </th>
                        </tr>
                    </thead>
                    <?php
//                    $schueler2 = Schueler::getAll($vorname, $nachname, $name);
//                    foreach ($schueler2 as $value) {
//                        echo $value['vorname'] ,$value['nachname'] , $value['name'];
//                    }
                    ?>

                    <?php echo SchuleHTML::buildTableContent($schuelerMitKlasseNamen); ?>

                </table>
            </form>
        </header>
    </article>
</section>
<?php
include './view/aside.php';
