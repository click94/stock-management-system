<?php

require_once 'Controller.php';

require_once __DIR__ . '/../model/Warehouse.php';
require_once __DIR__ . '/../model/Stock.php';
require_once __DIR__ . '/../model/Product.php';

class HomeController extends Controller{

    public static function index(){
        $warehouse = new Warehouse();
        $warehouseList = $warehouse->get();

        $stock = new Stock();
        $stockList = $stock->get();

        $product = new Product();
        $productList = $product->get();

        $page = 'home';
        self::view('layouts/app.php', 
            [
                "page" => $page, 
                "warehouseList" => $warehouseList,
                "stockList" => $stockList,
                "productList" => $productList
            ]);
    }


}