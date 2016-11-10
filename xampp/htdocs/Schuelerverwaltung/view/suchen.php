<?php

$schule = Schueler::getByLikeness($suche);
?>
</section>
<section id="content">
    <article>
        <header>
            <h1>header</h1>
            <table id="example1_table">
                <thead>
                    <tr>

                    </tr>
                </thead>
               <?php echo SchuleHTML::buildTableContent($schule); ?>
            </table>
        </header>
    </article>
</section>
<?php include './view/aside.php';
