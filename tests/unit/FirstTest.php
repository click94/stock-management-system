
<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/../../model/Stock.php';
require_once __DIR__ . '/../../model/Warehouse.php';
require_once __DIR__ . '/../../controllers/StockController.php';
require_once __DIR__ . '/../../controllers/WarehouseController.php';

class FirstTest extends TestCase{

    public function testAddStock(){
        $stock = new Stock();

        $warehouse_id = 1;

        $stock->setWarehouseId($warehouse_id);
        $stock->setProductId(1);
        $stock->setQuantity(10);

        $this->assertTrue( $stock->insert());

        $stock = new Stock();
        $warehouseStock = $stock->get($warehouse_id);
        $this->assertNotEmpty($warehouseStock);
    }

    public function testNotEnoughCapacity(){
        $data = [
            "product_id"        => 1,
            "warehouse_id"      => 1,
            "quantity"          => 9999999999999
        ];
        $result = StockController::insert($data);
        $this->assertEquals($result["warehouse"][0], "Not enough capacity");
    }

    public function testAddWarehouse(){
        $warehouse = new Warehouse();
        $warehouse->setName("xyz");
        $warehouse->setTitle("xyz150");
        $warehouse->setCapacity("150");

        $this->assertTrue( $warehouse->insert());
    }

    public function testDeleteStock(){
        $stock = new Stock();
        $this->assertTrue(  $stock->delete(1));
    }

}
