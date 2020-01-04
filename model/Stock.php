<?php

require_once 'Model.php';

class Stock extends Model {

    public $id;

    public $product_id;

    public $warehouse_id;

    public $quantity;


    function setId($id) {
        $this->id = $id;
    }

    public function setProductId($product_id){
        $this->product_id = $product_id;
    }

    public function setWarehouseId($warehouse_id){
        $this->warehouse_id = $warehouse_id;
    }

    public function setQuantity($quantity){
        $this->quantity = $quantity;
    }


    function getId($id) {
        return $this->id;
    }

    public function getProductId(){
        return $this->product_id;
    }


    public function getWarehouseId(){
        return $this->warehouse_id;
    }

    public function getQuantity(){
        return $this->quantity;
    }

    function get($warehouse_id = NULL){
        $json = [];
        $where = "";
        if(!empty($warehouse_id)){
            $where = " WHERE a.warehouse_id = " . $warehouse_id;
        }
        $sql = "SELECT a.*, b.name as product, c.id as warehouse_id, c.name as warehouse FROM stock a left join product b on a.product_id = b.id left join warehouse c on a.warehouse_id = c.id " . $where . " order by c.id;";
        $result = $this->conn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            $row['product'] =  $row['product'];
            $row['quantity'] = (int) $row['quantity'];
            $json[$row['warehouse_id']][] = $row;
        }
        return $json;
    }

    function insert(){
        $sql = "INSERT INTO stock (`product_id`, `warehouse_id`, `quantity`)" .
            "VALUES ('".$this->getProductId()."', '".$this->getWarehouseId()."', '".$this->getQuantity()."')";
        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    function delete($id){
        $sql = "DELETE FROM stock WHERE id='$id'";

        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }
}