<?php

class SchulklasseHTML {

    public static function buildTableContent($schule) {
        $html = "<tbody>";
        for ($index = 0; $index < count($schule); $index++) {
            $html .= "
            <tr>
                <td>{$schule[$index]->getName()}</td>
                    <td><input type='checkbox' name='delete_klasse_id[]' value='{$schule[$index]->getId()}' /></td> 
                    <td><a href='index.php?id={$schule[$index]->getId()}&navi=6'>Ändern</a></td>
            </tr>";
        }
        $html .= "</tbody>";
        return $html;
    }

    public static function buildDropdown($schule) {
        $html = "";
        for ($index = 0; $index < count($schule); $index++) {
            $wert = $schule[$index]->getId();
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
