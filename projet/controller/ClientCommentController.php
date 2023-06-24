<?php
include_once("../model/ClientComment.php");

class ClientCommentController
{
    public ClientComment $client_comment;

    /**
     * Init l'objet ClientComment
     * @param ClientComment|null $clientComment
     */
    public function __construct(ClientComment $client_comment = null)
    {
        if ($client_comment) {
            $this->client_comment = $client_comment;
        } else {
            $this->client_comment = new ClientComment();
        }
    }

    /**
     * Générer la valeur de Comment, modification et creation, en function de id présente
     * @param mixed $param
     * @return bool
     */
    public function saveComment($param)
    {
        try {
            foreach($param as $key => $value) {
                if (array_key_exists($key, $this->client_comment->liste_fields)) {
                    $this->client_comment->$key = $value;
                }
            }

            $this->client_comment->id_client = $_SESSION['user']['id'];
            if ($this->client_comment->id ) {
                // vérifier si le client est la maitre de comment
                if ($this->client_comment->id_client == $_SESSION['user']['id']) {
                    return $this->client_comment->update();
                } else {
                    throw new ErrorException("Le client pas de doit sur ce comment", 0);
                }
            } else {
                $this->client_comment->id_client == $_SESSION['user']['id'];
                return $this->client_comment->create();
            }
        } catch (\Throwable $th) {
            echo 'Message Erreur : ' , $th->getMessage(), "\n";
        }
        return false;
    }

    public function deleteComment()
    {
        $this->client_comment->delete();
    }
}