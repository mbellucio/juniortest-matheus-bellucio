<?php
    include "includes/class-autoloader.inc.php"; 

    $productTypeString = $_POST['producttype']; 
    $productType = new ReflectionClass($productTypeString);
    $productTypeInstance = $productType->newInstance(); 
    $controller = new ProductController();  
    $controller->addProduct($productTypeInstance, "jvc202", "Chair", 200, 24, 45, 15); 

