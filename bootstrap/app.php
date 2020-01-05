<?php

use App\Routes\Routes;

class Decision
{
    private static $section, $uri, $method, $data;
    public function __construct()
    {
        $requestURI = explode('/', $_SERVER['REQUEST_URI']);
        self::$method = $_SERVER['REQUEST_METHOD'];
        self::$data = $_REQUEST;
        self::$uri = array_values($requestURI);
        self::$section =self::$uri[1];
    }


    public function start(){
        Routes::invoke(self::$uri, self::$data, self::$method);
    }
}

return new Decision();