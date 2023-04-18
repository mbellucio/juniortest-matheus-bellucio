<?php
include "class-autoloader.inc.php"; 

if (isset($_POST['skus'])) {
  $skus = $_POST['skus'];
  $productController = new classes\controller\ProductController(); 
  $productController->massDelete($skus);
}

