<?php
    include "includes/class-autoloader.inc.php"; 

    $productTypeString = $_POST['producttype']; 
    $productType = new ReflectionClass($productTypeString);
    $productTypeInstance = $productType->newInstance(); 
    $controller = new ProductController();  
    $controller->addProduct($productTypeInstance, "pdct2489", "DVD", 20, 200); 

