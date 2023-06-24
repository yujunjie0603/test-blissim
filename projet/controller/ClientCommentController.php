<?php
include_once("../model/ClientComment.php");

class ClientCommentController
{
    public ClientComment $client_comment;

    public function __construct(ClientComment $clientComment = null)
    {
        if ($clientComment) {
            $this->client_comment = $clientComment;
        } else {
            $this->client_comment = new ClientComment();
        }
    }

    public function saveComment($param)
    {
        try {
            foreach($param as $key => $value) {
                if (array_key_exists($key, $this->client_comment->liste_fields)) {
                    $this->client_comment->$key = $value;
                }
            }
            $this->client_comment->id_client = $_SESSION['user']['id'];
            if ($this->client_comment->id) {
                $this->client_comment->update();
            } else {
                $this->client_comment->create();
            }
        } catch (\Throwable $th) {
            
        }

    }

    public function deleteComment()
    {
        $this->client_comment->delete();
    }
}