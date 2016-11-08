<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SchuleHTML
 *
 * @author Teilnehmer
 */
class SchuleHTML {
    public static function buildTableContent($schule) {
        $html = "<tbody>";
        for ($index = 0; $index < count($schule); $index++) {
            $html .= "
            <tr>
                <td>{$schule[$index]->getVorname()}</td>
                <td>{$schule[$index]->getNachname()}</td>
                <td>{$schule[$index]->getSchulklasse_id()}</td>
                    
            </tr>";
        }
        $html .= "</tbody>";
        return $html;
    }
}
