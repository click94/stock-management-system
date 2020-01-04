<?php

class Controller{

    public static function view($path, $d){
        $array = $d;
        include_once __DIR__ . '/../views/' . $path;
    }

}