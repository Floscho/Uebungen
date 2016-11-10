<?php

class SchuleHTML {

    public static function buildTableContent($schule) {
        $html = "<tbody>";

        for ($index = 0; $index < count($schule); $index++) {
            $html .= "
            <tr>
                <td>{$schule[$index]->getVorname()}</td>
                <td>{$schule[$index]->getNachname()}</td>
                <td>{$schule[$index]->getSchulklasse_id()}</td>
                <td><input type='checkbox' name='delete_schueler_id[]' value='{$schule[$index]->getId()}' /></td> 
                <td><a href='index.php?id={$schule[$index]->getId()}&navi=5'>Ändern</a></td>
                
            </tr>";
//            <tr><form action='index.php' method='GET'>
//                <td>{$schule[$index]->getVorname()}</td>
//                <td>{$schule[$index]->getNachname()}</td>
//                <td>{$schule[$index]->getSchulklasse_id()}</td>
//                <td><input type='checkbox' name='Loeschen' value='ON' /></td> 
//                <td><button type='submit' value='{$schule[$index]->getId()}' name='aendern' />aendern</button></td>
//                <td><input type='hidden' value='5' name='navi' /></td>
//                </form>
//            </tr>";
        }
        $html .= "</tbody>";
        return $html;
    }
}
