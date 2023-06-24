<?php
include_once("../controller/ProductController.php");
include_once("../controller/ClientCommentController.php");
include_once("../controller/ClientsCommentsController.php");
if (empty($_GET['id'])) {
    header('Location:/public/index.php');
    exit;
} else {
    include("header.php");
    $product = new ProductController($_GET['id']);
    $a_product = TableFactory::getValuesArray($product->product);
    if ($a_product['id']) {
        $comments = ClientsCommentsController::getClientCommentByProduct($a_product['id']);
    }
?>
    <div>
        <label for="">Name : </label>
        <p><?=$a_product['name'];?></p>
    </div>
    <div>
        <label for="">Description : </label>
        <p><?=$a_product['comment'];?></p>
    </div>
    <div>
        <label for="">Price : </label>
        <p><?=$a_product['price'];?></p>
    </div>
<?php
    if (count($comments)) {
        foreach($comments as $comment) {
?>
        <p><?=$comment->comment;?></p>
<?php
        }
    }
    if (!empty($_SESSION['user'])) {
?>
    <form>
        <label for="">commentaire: </label>
        <textarea name="comment">
            
        </textarea>
    </form>
<?php
    }
}
include("footer.php");
?>