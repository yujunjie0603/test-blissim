<?php
include("header.php");
include("../controller/ProductController.php");
$products = ProductController::getAllProduct();
if (count($products)) {
    foreach ($products as $product) {
?>
    <div class="row">
        <label class="col-md-1">Nom : </label>
        <p class="col-md-2"><?=$product['name'];?></p>
        <a class="col-md-2" href="product.php?id=<?=$product['id'];?>"> Détail </a>
    </div>
    <hr>
<?php
    }
}

?>


<?php
include("footer.php");
?>