<?php
    
include "class-autoloader.inc.php"; 

$sku = $_POST['sku']; 
$productController = new classes\controller\ProductController();
$result = $productController->checkSku($sku); 
echo $result; 

