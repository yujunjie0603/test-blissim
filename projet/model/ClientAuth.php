<?php
include_once("InterfaceDataConditions.php");
include_once("Client.php");
include_once("MysqlConnect.php");

class ClientAuth implements DataConditions
{
    protected $_table = "clients";
    protected $_db ;
    public function __construct()
    {
        $this->_db = MySQL::getInstance();
    }

    public function login($login)
    {
        $condition = " email = '"  . $this->_db->real_escape_string($login) . "'";
        $clients = $this->getDataByConditions($condition);
        if ($clients) {
            return $clients;
        }
        return false;
    }

    public function getDataByConditions($condition)
    {
        $sql = "SELECT id FROM " . $this->_table . " WHERE ";
        $sql .= $condition;

        $res = $this->_db->query($sql);
        $val = $res->fetch_assoc();
        if ($val) {
            return new Client($val['id']);
        }
        return false;
    }
}