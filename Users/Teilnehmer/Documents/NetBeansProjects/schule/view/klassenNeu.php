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
                        <th>Name</th>
                        <th>Art</th>
                        <th>Note</th>
                        <th>Kommentar</th>
                    </tr>
                </thead>
                <?php echo SchuleHTML::buildTableContent($schule); ?>
            </table>
        </header>
    </article>
</section>

