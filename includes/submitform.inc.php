<?php
    include "class-autoloader.inc.php"; 

    $productTypeString = $_POST['productType']; 
    $productType = new ReflectionClass($productTypeString);
    $productTypeInstance = $productType->newInstance(); 

    $sku = $_POST['sku']; 
    $name = $_POST['name']; 
    $price = $_POST['price'];
    $params = json_decode($_POST['properties'], true);

    $controller = new ProductController();  
    $controller->addProduct($productTypeInstance, $sku, $name, $price, ...$params); 

