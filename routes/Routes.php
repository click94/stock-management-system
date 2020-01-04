<?php

require_once __DIR__ . '/../routes/Route.php';
require_once __DIR__ . '/../controllers/HomeController.php';
require_once __DIR__ . '/../controllers/WarehouseController.php';
require_once __DIR__ . '/../controllers/StockController.php';

class Routes extends Route
{
    private static $data, $method;
    public static function invoke($uri, $data, $method){
        self::$method = $method;
        if($method == "PATCH"){
            parse_str(file_get_contents('php://input'), self::$data);
        }else{
            self::$data = $data;
        }
        $arr = explode("?", $uri[1], 2);
        $section = $arr[0];
        self::findController($section);
    }

    static function findController($section){
        switch($section){
            case '':
                HomeController::index();
                break;
            case 'warehouse':
                if(self::$method == 'POST')
                    WarehouseController::insert(self::$data);
                break;
            case 'stock':
                if(self::$method == 'POST')
                    StockController::insert(self::$data);
                break;
            case 'stockDelete':
                if(self::$method == 'POST')
                    StockController::delete(self::$data['id']);
                break;
            case 'test_addProductsShowStock':
                    TestController::addProductsShowStock();
                break;
        }
    }
}