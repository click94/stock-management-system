<?php

namespace App\Models;

class Warehouse extends Model {

    public $id;

    public $name;

    public $title;

    public $capacity;


    public function setId($id) {
        $this->id = $id;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function setTitle($title) {
        $this->title = $title;
    }

    public function setCapacity($capacity) {
        $this->capacity = $capacity;
    }

    public function getId($id) {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function getTitle() {
        return $this->title;
    }

    public function getCapacity() {
        return $this->capacity;
    }

    public function get(){
        $json = [];
        $sql = "SELECT * FROM warehouse";
        $result = $this->conn->query($sql);
        while($row = mysqli_fetch_assoc($result)){
            $row['id'] = $row['id'];
            $row['name'] =  $row['name'];
            $row['title'] =  $row['title'];
            $row['capacity'] =  $row['capacity'];
            $json[] = $row;
        }
        return $json;
    }

    public function insert(){
        $sql = "INSERT INTO warehouse (`name`, `title`, `capacity`)" .
            "VALUES ('".$this->getName()."', '".$this->getTitle()."', '".$this->getCapacity()."')";
        if ($this->conn->query($sql) === TRUE) {
            $this->conn->close();
            return true;
        } else {
            $this->conn->close();
            return false;
        }
    }

    public function getAvailableCapacity($id){
        $sql = "SELECT a.capacity - SUM(b.quantity) as capacity FROM warehouse a LEFT JOIN stock b on b.warehouse_id = a.id WHERE a.id ='$id' group by a.id";
        $result = $this->conn->query($sql);
        $data = mysqli_fetch_assoc($result);
        if(!empty($data) && !empty($data["capacity"])){
            return (int)$data["capacity"];
        }
        return 0;
    }

    public function getWarehouseWithAvailableCapacity($quantity){
        $sql = "SELECT a.* FROM warehouse a LEFT JOIN stock b on b.warehouse_id = a.id group by a.id HAVING (a.capacity - COALESCE(SUM(b.quantity), 0)) >= '$quantity'";
        $result = $this->conn->query($sql);
        $row = mysqli_fetch_assoc($result);
        if(!empty($row)){
            return $row;
        }
        return NULL;
    }
}