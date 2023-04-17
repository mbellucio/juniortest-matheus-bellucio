<?php
include "class-autoloader.inc.php"; 

if (isset($_POST['skus'])) {
  $skus = $_POST['skus'];
  $productController = new ProductController(); 
  $productController->massDelete($skus);
}


header("Location: ../index.php");
exit(); 