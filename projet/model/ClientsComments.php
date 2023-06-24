<?php

include_once('../model/ClientsComments.php');
include_once('../model/InterfaceDataConditions.php');

class ClientsComments implements DataConditions
{
    protected $_table = "clients_comments";
    protected $_db ;
    public function __construct()
    {
        $this->_db = MySQL::getInstance();
    }
    public function getClientCommentById($id)
    {
        $condition = " id = '" . $id . "'"; 
        $client_comment = $this->getDataByConditions($condition);
        if (count($client_comment)) {
            return $client_comment[0];
        }
        return $client_comment;

    }
    public function getClientCommentByClient($id_client){
        $condition = " id_client = '" . $this->_db->real_escape_string($id_client) . "'"; 
        return $this->getDataByConditions($condition);
    }
    public function getClientCommentByProduct($id_product){
        $condition = " id_product = '" . $this->_db->real_escape_string($id_product) . "'"; 
        return $this->getDataByConditions($condition);
    }
    public function getClientCommentByClientProduct($id_client, $id_product){
        $condition = " id_product = '" . $this->_db->real_escape_string($id_product) . "'"; 
        return $this->getDataByConditions($condition);
    }

    public function getDataByConditions($conditions)
    {
        $liste_client_comments = array();

        $sql = "SELECT id, id_client, id_product, comment, create_at, update_at FROM " . $this->_table . " WHERE " . $conditions;
        $res = $this->_db->query($sql);
        if ($res && $res->num_rows) {
            while($val = $res->fetch_assoc()) {
                $liste_client_comments = new ClientComment($val['id']);
            }
        }
        return $liste_client_comments;
    }
}