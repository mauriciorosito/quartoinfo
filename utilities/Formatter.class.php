<?php

/**
 * Description of Formatter
 *
 * @author eduardo.180496
 */
class Formatter {

    public static function getDateDatabaseFormat($date) {
        $arrayDate = explode("/", $date);
        return $arrayDate[2] . "-" . $arrayDate[1] . "-" . $arrayDate[0];
    }

    public static function getDateBrazilianFormat($date) {
        $arrayDate = explode("-", $date);
        return $arrayDate[2] . "/" . $arrayDate[1] . "/" . $arrayDate[0];
    }
        
}
