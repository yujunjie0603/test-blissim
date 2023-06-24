<?php
include_once("../model/ClientsComments.php");

class ClientsCommentsController
{ 
    public static function getClientCommentByProduct($id_product)
    {
        $comment = new ClientsComments();
        return $comment->getClientCommentById($id_product);
    }

    public static function getClientCommentByClientProduct($id_client, $id_product)
    {
        $comment = new ClientsComments();
        return $comment->getClientCommentByClientProduct($id_client, $id_product)[0];
    }
}