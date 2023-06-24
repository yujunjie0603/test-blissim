<?php

include_once("../model/AbstractBlissim.php");
include_once("Client.php");
include_once("Product.php");

class ClientComment extends AbstractBlissim
{
    protected $_tablename = "clients_comments";

    public $id;
    public $id_client;
    public $id_product;
    public $comment;
    public $create_at;
    public $update_at;
    public $delete_at;
    protected $_client;
    protected $_product;
    public function __construct($id = "")
    {
        parent::__construct($id);
        if ($this->id_client) {
            $this->setClient();
        }
        if ($this->id_product) {
            $this->setProduct();
        }
    }
    /**
     * Summary of create
     * @return bool
     */
    public function create()
    {
        $this->create_at = date('Y-m-d H:i:s');
        return $this->save("create");
    }

    /**
     * Summary of update
     * @return bool
     */
    public function update()
    {
        $this->update_at = date('Y-m-d H:i:s');
        return $this->save("update");
    }

    /**
     * @return bool
     */
    public function delete()
    {
        if ($this->id) {
            $sql = "DELETE FROM " . $this->_tablename . " WHERE id = '" . $this->_db->real_escape_string($this->id) . "'";
            if (!$this->_db->query($sql)) {
                throw new Exception('Erreur Delete');
            }
            return true;
        } else {
            throw new Exception('Erreur Event, Comment n exist pas');
        }
        return false;
    }

    protected function setClient()
    {
        $this->_client = new Client($this->id_client);
    }

    protected function setProduct()
    {
        $this->_product = new Product($this->id_product);
    }

    public function getProduct()
    {
        return $this->_product;
    }

    public function getClient()
    {
        return $this->_client;
    }
}