<?php
    
class ProductView extends Product {
  public function showAllProducts() {
    $result = $this->fechtAllProducts(); 
    return $result; 
  }

  public function handleForm(ProductViewInterface $productType) {
    $html = $productType->generateForm(); 
    echo $html; 
  }
}

