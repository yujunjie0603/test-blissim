<?php
include_once("../model/Client.php");

class ClientsLoginController
{

    /**
     * login
     * @param mixed $login
     * @param mixed $pwd
     * @return bool
     */
    public function login($login, $pwd) {
        $o_client = new ClientAuth();
        $client = $o_client->login($login);
        if ($client) {
            if (password_verify($pwd, $client->password)) {
                session_start();
                $_SESSION['user'] = TableFactory::getValuesArray($client);
                return true;
            }
        }
        return false;
    }
}
