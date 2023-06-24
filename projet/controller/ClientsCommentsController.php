<?php
include_once("../model/ClientsComments.php");

class ClientsCommentsController
{ 
    public static function getClientCommentByProduct($id_product)
    {
        $Comment = new ClientsComments();
        return $Comment->getClientCommentById($id_product);
    }

    public static function getClientCommentByClientProduct($id_client, $id_product)
    {
        $Comment = new ClientsComments();
        return $Comment->getClientCommentByClientProduct($id_client, $id_product);
    }
}