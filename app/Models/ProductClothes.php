<?php

namespace App\Models;

class ProductClothes extends Product {
    
    public $color;

    function setColor($color) {
        $this->color = $color;
    } 

    function getColor() {
        return $this->color;
    }

}