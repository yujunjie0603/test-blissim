<?php
include_once("../controller/ProductController.php");
include_once("../controller/ClientCommentController.php");
include_once("../controller/ClientsCommentsController.php");
if (empty($_GET['id'])) {
    header('Location:/public/index.php');
    exit;
} else {
    $product = new ProductController($_GET['id']);
    $a_product = TableFactory::getValuesArray($product->product);
    include("header.php");
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
    <hr />
<?php
    include("comments.php");
}
include("footer.php");
?>