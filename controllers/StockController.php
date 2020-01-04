<?php

require_once 'Controller.php';
require_once __DIR__ . '/../helper/ValidateParams.php';
require_once __DIR__ . '/../model/Warehouse.php';

class StockController extends Controller{

    public static function insert($data){
        $stock = new Stock();
        $result = true;
        $d = [];
        if (!ValidateParams::validateInteger($data['warehouse_id'])) {
            $result = false;
            $d['name'] = ['The capacity must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['product_id'])) {
            $result = false;
            $d['name'] = ['The capacity must be a integer value'];
        }
        if (!ValidateParams::validateInteger($data['quantity'])) {
            $result = false;
            $d['quantity'] = ['The capacity must be a integer value'];
        }

        if (!ValidateParams::validateInteger($data['quantity'])) {
            $result = false;
            $d['quantity'] = ['The capacity must be a integer value'];
        }

        $warehouse = new Warehouse();
        $availableCapacity = $warehouse->getAvailableCapacity($data['warehouse_id']);
        if((int)$data['quantity'] > $availableCapacity){
            $warehouse = $warehouse->getWarehouseWithAvailableCapacity($data['quantity']);
            if(!empty($warehouse)){
                $data['warehouse_id'] = $warehouse["id"];
            }else{
                $result = false;
                $d =['warehouse' => ['Not enough capacity']];
            }
        }
        if($result == true){
            $stock->setWarehouseId($data['warehouse_id']);
            $stock->setProductId($data['product_id']);
            $stock->setQuantity($data['quantity']);

            $stock = $stock->insert();
            if ($stock == false) {
                $d = ['stock' => ['There was an error inserting stock.']];
                echo json_encode($d);
            } else {
                $d = ['stock' => ['Stock has been successfully added.']];
                echo json_encode($d);
            }
        }else{
            echo json_encode($d);
        }
        return $d;
    }
    public static function delete($id){
        $stock = new Stock();
        if($stock->delete($id)){
            $d = ['stock' => ['Stock has been successfully deleted.']];
            echo json_encode($d);
        }else{
            $d = ['stock' => ['There was an error deleting stock.']];
            echo json_encode($d);
        }
    }
}