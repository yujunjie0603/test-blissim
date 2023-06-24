<?php

include_once("../model/AbstractBlissim.php");

class Product extends AbstractBlissim
{

    protected $_tablename = "products";
    public $id;
    public $name;
    public $comment;
    public $price;
    public $active;

    public function __construct($id = "")
    {
        parent::__construct($id);
    }
    /**
     * Summary of create
     * @return bool
     */
    public function create()
    {
        return $this->save("create");
    }

    /**
     * Summary of update
     * @return bool
     */
    public function update()
    {
        return $this->save("update");
    }

    public function delete()
    {
        $this->active = 0;
        return $this->save("update");
    }
}