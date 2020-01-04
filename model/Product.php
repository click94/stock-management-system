<?php

require_once 'Model.php';

class Product extends Model {
    
    public $id;

    public $item_number;

    public $name;

    public $price;

    public $brand_id;

    public $weight;
    
    function setId($id) {
        $this->id = $id;
    }

    function setItemNumber($item_number) {
        $this->item_number = $item_number;
    }

    function setName($name) {
        $this->name = $name;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setBrandId($brand_id) {
        $this->brand_id = $brand_id;
    }   

    function setWeight($weight) {
        $this->weight = $weight;
    }   

       
    function getId($id) {
        return $this->id;
    }

    function getItemNumber() {
        return $this->item_number;
    }

    function getName() {
        return  $this->name;
    }

    function getPrice() {
        return $this->price ;
    }

    function getBrandId() {
        return $this->brand_id;
    }   
    
    function getWeight() {
        return $this->weight;
    }

    function get(){
        $json = [];
        $sql = "SELECT * FROM product;";
        $result = $this->conn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            $row['id'] =  $row['id'];
            $row['name'] =  $row['name'];
            $json[] = $row;
        }
        return $json;
    }
}
