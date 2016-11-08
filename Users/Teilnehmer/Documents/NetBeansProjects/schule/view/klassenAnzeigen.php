<?php
/* $sql = "SELECT * FROM kneipen";
  $statement = $mysqli->prepare($sql);
  $statement->execute();

  $statement->bind_result($id, $Name, $Art, $Note, $Kommentar); */

$schule = Schulklasse::getAll();
?>
<section id="content">
    <article>
        <header>
            <h1>header</h1>
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Schulklasse</th>
                    </tr>
                </thead>
                <?php echo SchulklasseHTML::buildTableContent($schule); ?>
            </table>
        </header>
    </article>
</section>

<!--Bindet aside Menü ein wegen Mehrfachverwendung von Suchmaske-->
<?php include './view/aside.php'; ?>
