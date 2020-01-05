<?php

namespace App\Models;

class ProductBeauty extends Product {

    public $type;

    function setType($type) {
        $this->type = $type;
    } 

    function getType() {
        return $this->type;
    }

}