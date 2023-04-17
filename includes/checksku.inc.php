<?php
    
include "class-autoloader.inc.php"; 

  $sku = $_POST['sku']; 
  $productController = new ProductController();
  $result = $productController->skuExists($sku); 
  echo $result; 

