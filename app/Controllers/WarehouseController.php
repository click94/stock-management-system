<?php

namespace App\Controllers;

use App\Models\Warehouse;
use App\Helper\ValidateParams;

class WarehouseController extends Controller{

    public static function insert($data){
        $warehouse = new Warehouse();
        $result = true;
        $d = [];
        if (!ValidateParams::validateInteger($data['capacity'])) {
            $result = false;
            $d['capacity'] = ['The capacity must be a integer value'];
        }
        if (!ValidateParams::name($data['name'])) {
            $result = false;
            $d['name'] = ['The name must be a valid string and it\'s length must not be greater than 70 chars .'];
        }

        if($result == true){

            $warehouse->setName($data["name"]);
            $warehouse->setTitle($data["title"]);
            $warehouse->setCapacity($data["capacity"]);

            $warehouse = $warehouse->insert();
            if ($warehouse == false) {
                $d = ['warehouse' => ['There was an error inserting warehouse.']];
                echo json_encode($d);
            } else {
                $d = ['warehouse' => ['Warehouse has been successfully added.']];
                echo json_encode($d);
            }
        }else{
            echo json_encode($d);
        }
        return $d;
    }
}