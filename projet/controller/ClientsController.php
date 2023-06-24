<?php
include_once("../model/Client.php");
class ClientController
{
    public function getClientById($id)
    {
        $client = new Client($id);
        if ($client) {
            return $client;
        }
        return false;
    }

    public function CheckAuth($login, $pwd)
    {
        $client = new ClientAuth($login, $pwd);
        if ($client->auth()) {
            return $client;
        }
        return false;
    }
}