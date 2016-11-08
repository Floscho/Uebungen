<?php

class SchulklasseHTML {

    public static function buildTableContent($schule) {
        $html = "<tbody>";
        for ($index = 0; $index < count($schule); $index++) {
            $html .= "
            <tr>
                <td>{$schule[$index]->getName()}</td>
                    <td><input type='checkbox' name='löschen' value='ON' /></td>
                    <td><input type='submit' value='ändern' name='ändern' /></td>
            </tr>";
        }
        $html .= "</tbody>";
        return $html;
    }

    public static function buildDropdown($schule) {
        $html = "";
        for ($index = 0; $index < count($schule); $index++) {
            $wert = $index + 1;
            $html .= "<option value=$wert>{$schule[$index]->getName()}</option>";
        }

        return $html;
    }

}
