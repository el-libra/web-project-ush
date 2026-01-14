<?php
class BookController{
    private $conn;
    public function __construct($database){
        $this->conn = $database;
    }
}