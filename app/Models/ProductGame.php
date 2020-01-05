<?php

namespace App\Models;

class ProductGame extends Product {

    public $age_group;

    function setAgeGroup($age_group) {
        $this->age_group = $age_group;
    } 

    function getAgeGroup() {
        return $this->age_group;
    }
}