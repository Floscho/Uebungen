<?php

class SchulklasseHTML {

    public static function buildTableContent($schule) {
        $html = "<tbody>";
        for ($index = 0; $index < count($schule); $index++) {
            $html .= "
            <tr>
                <td>{$schule[$index]->getName()}</td>
                    <form action='index.php' method='GET'>
                    <td><input type='checkbox' name='löschen' value='ON' /></td>
                    <td><button type='submit' value='{$schule[$index]->getId()}' name='aendern' />aendern</button></td>
                    <td><input type='hidden' value='6' name='navi' /></td>
                    </form>
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
//
//    public static function buildDropdownPreselected($schule, $klassenID) {
//        $html = "";
//        for ($index = 0; $index < count($schule); $index++) {
//            $wert = $index + 1;
//            if ($index == $klassenID) {
//                $selected = "selected";
//            } else {
//
//                $selected = "";
//            }
//            $html .= "<option value=$wert $selected>{$schule[$index]->getName()}</option>";
//        }
//        
//
//
//        return $html;
//    }

}
