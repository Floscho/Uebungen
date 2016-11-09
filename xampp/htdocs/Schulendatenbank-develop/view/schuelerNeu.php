<?php
$schule = Schulklasse::getAll();
?>
<section id="content">
    <article>
        <header>
            <h1>Schüler anlegen</h1>

            <table border="0" cellpadding="5" cellspacing="10" >
                <tbody>
                <form action="index.php" method="POST">
                    <div id="textfelder">
                    <tr>
                        <td>Vorname</td>
                        <td><input type="text" name="vorname" value="" size="30" placeholder="Der gesuchte Vorname:"/></td>
                    </tr>
                    <tr>
                        <td>Nachname</td>
                        <td><input type="text" name="nachname" value="" size="30" placeholder="Der gesuchte Nachname:"/></td>
                    </tr>
                    </div>
                    <tr>
                        <td>Schulklasse</td>
                        <td><select name="schulklasse">
                                <?php echo SchulklasseHTML::buildDropdown($schule); ?>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" value="Absenden" /></td>
                        <td><input type="reset" value="reset" /></td>
                        <td><input type="hidden" name="sent" value="1" /></td>
                    </tr>
                </form>
                </tbody>
            </table>

        </header>
    </article>
</section>
