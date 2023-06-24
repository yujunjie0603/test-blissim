<?php

include_once('../model/Product.php');

class Products
{
    public $products = array();
    
    public function __construct()
    {
        $conn = MySQL::getInstance();
        $sql = "SELECT id FROM products ";
        $res = $conn->query($sql);
        while($val = $res->fetch_assoc()) {
            $this->products[$val['id']] = new Product($val['id']);
        }
    }
}