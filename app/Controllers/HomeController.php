<?php

namespace App\Controllers;

use App\Models\Warehouse;
use App\Models\Stock;
use App\Models\Product;

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