<?php

include_once("../model/AbstractBlissim.php");

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

    
}