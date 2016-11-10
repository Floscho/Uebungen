<?php
$schule = Schueler::getAll();
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
                                <!--<input type='hidden' name='delete_schueler_id' value='1' />-->
                            </th>
                        </tr>
                    </thead>
                    <?php echo SchuleHTML::buildTableContent($schule); ?>
                </table>
            </form>
        </header>
    </article>
</section>
<?php
include './view/aside.php';
