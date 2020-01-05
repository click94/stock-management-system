<?php

namespace App\Models;

class Model {

    public $conn;

    public function __construct()
    {
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "database";
        $this->conn = new \mysqli($servername, $username, $password, $dbname);
    }
}