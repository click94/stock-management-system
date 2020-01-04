<?php

require_once 'Model.php';

class Brand extends Model {

    public $id;

    public $brand_name;

    public $quality_category;


    function setId($id) {
        $this->id = $id;
    }

    function setBrandName($brand_name) {
        $this->brand_name = $brand_name;
    }

    function setQualityCategory($quality_category) {
        $this->quality_category = $quality_category;
    }


    function getId($id) {
        return $this->id;
    }

    function getBrandName() {
        return $this->brand_name;
    }

    function getQualityCategory() {
        return $this->quality_category;
    }
    
}