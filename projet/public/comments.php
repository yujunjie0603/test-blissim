<?php
if (isset($_POST['valide']) && !empty($_POST['comment']) && !empty($_POST['id_product'])) {
    // vérifier si le commentaire exist pour ce client sur ce produit
    if ($old_comment = ClientsCommentsController::getClientCommentByClientProduct($_SESSION['user']['id'], $_POST['id_product'])) {
        $new_comment = new ClientCommentController($old_comment);
    } else {
        $new_comment = new ClientCommentController();
    }
    // mis à jour data
    $new_comment->saveComment($_POST);
}
$comments = array();
if ($_GET['id']) {
    $comments = ClientsCommentsController::getClientCommentByProduct($_GET['id']);
}
?>

<div>
    <p>Commentaires : </p>
<?php
    if ($comments) {
        foreach($comments as $comment) {
?>
        <p><?=$comment->getClient()->name;?> : <?=$comment->comment;?></p>
        <hr />
<?php
        }
    }
    if (!empty($_SESSION['user'])) {
?>
    <form method="post" action="#">
        <label for="">commentaire: </label>
        <textarea name="comment"></textarea>
        <input type="hidden" name="id_product" value="<?=$_GET['id'];?>" />
        <input type="submit" name="valide" />
    </form>
<?php
    }
?>        
</div>