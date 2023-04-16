<?php

    $productTypeString = $_POST['producttype']; 
    $productType = new ReflectionClass($productTypeString);
    $productTypeInstance = $productType->newInstance(); 
    $controller = new ProductController();  
    $controller->addProduct($productTypeInstance, "pdct22896", "chair", 220, 19, 25, 32); 

