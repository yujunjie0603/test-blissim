<?php
include_once("../model/Client.php");
include_once("../model/ClientAuth.php");
include_once("../factory/TableFactory.php");
class LoginController
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
                if(session_status() !== PHP_SESSION_ACTIVE)
                    session_start();
                $_SESSION['user'] = TableFactory::getValuesArray($client);
                return true;
            }
        }
        return false;
    }
}
