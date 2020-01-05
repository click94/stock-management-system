<?php

namespace App\Helper;

class ValidateParams{

    private static function security($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    public static function name($name){
        $name = self::security($name);
        if (!preg_match("/^[a-zA-Z ]*$/",$name) || strlen($name) >70) {
            return false;
        }
        return true;
    }


    public static function validateInteger($weight){
        $weight = self::security($weight);
        if (!filter_var($weight, FILTER_VALIDATE_INT) ) {
            return false;
        }
        return true;
    }


}