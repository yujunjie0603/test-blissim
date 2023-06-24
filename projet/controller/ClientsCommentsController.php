<?php
include_once("../model/ClientsComments.php");

class ClientsCommentsController
{ 
    /**
     * récupérer tous les comments de produit
     * @param mixed $id_product
     * @return array<ClientComment>|bool
     */
    public static function getClientCommentByProduct($id_product)
    {
        $comment = new ClientsComments();
        return $comment->getClientCommentById($id_product);
    }

    /**
     * recupérer le commentaire d'un produit d'un client
     * @param mixed $id_client
     * @param mixed $id_product
     * @return ClientComment
     */
    public static function getClientCommentByClientProduct($id_client, $id_product)
    {
        $comment = new ClientsComments();
        return $comment->getClientCommentByClientProduct($id_client, $id_product)[0];
    }
}