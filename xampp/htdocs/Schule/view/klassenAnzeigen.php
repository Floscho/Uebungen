<?php

$schule = Schulklasse::getAll();
?>
<section id="content">
    <article>
        <header>
            <h1>Schulklassen</h1>
            <table id="myTable">
                <thead>
                    <tr>
                        <th>Schulklasse</th>
                        <th>   <input type="submit" value="löschen" name="löschen" /></th>
                    </tr>
                </thead>
                <?php echo SchulklasseHTML::buildTableContent($schule); ?>
                
            </table>
        </header>
    </article>
</section>

<!--Bindet aside Menü ein wegen Mehrfachverwendung von Suchmaske-->
<?php include './view/aside.php';
