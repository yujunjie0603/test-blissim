<?php
session_start();
session_destroy();
header ("Location: /public/product.php"); 
exit;