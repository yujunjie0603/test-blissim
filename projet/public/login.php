<?php
include_once("../controller/LoginController.php");
$login_error = false;
if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['pwd'])) {
  $login = new LoginController();
  if ($login->login($_POST['email'], $_POST['pwd'])) {
    header("Location:/public/product.php");
  } else {
    $login_error = true;
  }
}
include_once("header.php");
if ($login_error) {
  echo "Vérifier login et pwd";
}
?>
<form action="#" method="post">
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" name="pwd" id="exampleInputPassword1" placeholder="Password">
  </div>
  <button type="submit" name="login" class="btn btn-primary">Submit</button>
</form>
<?php
include("footer.php");
?>