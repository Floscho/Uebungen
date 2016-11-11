<?php
$schule = Schulklasse::getAll();

?>
<section id="content">
    <article>
        <header>
            <h1>Klassen anzeigen</h1>
            <form action="index.php" method="POST">

                <table id="myTable">
                    <thead>
                        <tr>
                            <th>Schulklasse</th>
                            <th><input type="submit" value="löschen" name="löschen" /></th>
                        </tr>
                    </thead>
                    <?php 
                    echo SchulklasseHTML::buildTableContent($schule);
                    ?>
                    
                </table>
            </form>
        </header>
    </article>
</section>

<!--Bindet aside Menü ein wegen Mehrfachverwendung von Suchmaske-->
<?php
include './view/aside.php';
