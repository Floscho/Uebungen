<?php
/* $sql = "SELECT * FROM kneipen";
  $statement = $mysqli->prepare($sql);
  $statement->execute();

  $statement->bind_result($id, $name, $art, $note, $kommentar); */

//$schule = Schueler::getAll();
?>
<section id="content">
    <article>
        <header>
            <h1>Schüler anlegen</h1>
          
            <table border="0" cellpadding="5" cellspacing="10" >
                    <tbody>
                        <tr>
                            <td>Vorname</td>
                            <td><input type="text" name="vorname" value="" size="30" /></td>
                        </tr>
                        <tr>
                            <td>Nachname</td>
                            <td><input type="text" name="nachname" value="" size="30" /></td>
                        </tr>
                        <tr>
                            <td>Schulklasse</td>
                            <td><select name="schulklasse">
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                    <option></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><input type="submit" value="Speichern" /></td>
                        </tr>
                    </tbody>
                </table>

                <?php// echo SchuleHTML::buildTableContent($schule); ?>
            
        </header>
    </article>
</section>




