<?php
include("header.php");
if (isset($_POST['login']) && !empty($_POST['email']) && !empty($_POST['pwd'])) {
    echo "login in réussi";
}
?>
<form action="#" >
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