<?php

require_once 'Product.php';

class ProductClothes extends Product {
    
    public $color;

    function setColor($color) {
        $this->color = $color;
    } 

    function getColor() {
        return $this->color;
    }

}