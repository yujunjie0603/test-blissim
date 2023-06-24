<?php

include_once("../model/Products.php");
include_once("../model/Product.php");
include_once("../factory/TableFactory.php");

class ProductController
{
    public product $product;

    public function __construct($id = "")
    {
        $this->product = new Product($id);
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct(product $product)
    {
        $this->product = $product;
    }

    public static function getAllProduct()
    {
        $liste_products = new Products();
        $a_products = array();
        foreach($liste_products->products as $product) {
            $a_products[$product->id] = TableFactory::getValuesArray($product);
        }
        return $a_products;
    }

}
