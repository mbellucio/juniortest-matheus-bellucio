<?php
    
namespace classes\view;

use classes\model\ProductTypeInterface;
use classes\model\Product; 

class ProductView extends Product {
  public function showAllProducts() {
    $result = $this->fetchAllProducts(); 
    return $result; 
  }

  public function handleForm(ProductTypeInterface $productType) {
    $html = $productType->generateForm(); 
    echo $html; 
  }
}

