<?php
/* $sql = "SELECT * FROM kneipen";
  $statement = $mysqli->prepare($sql);
  $statement->execute();

  $statement->bind_result($id, $Name, $Art, $Note, $Kommentar); */

$schule = Schueler::getAll();
?>
<section id="content">
    <article>
        <header>
            <h1>header</h1>
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Vorname</th>
                        <th>Nachname</th>
                        <th>Schulklasse</th>
                        <th><input type="submit" value="Loeschen" name="loeschen" /></th>
                    </tr>
                </thead>

                <?php echo SchuleHTML::buildTableContent($schule); ?>
            </table>
        </header>
    </article>
</section>
<?php include './view/aside.php';
