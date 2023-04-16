<?php
    
class ProductView extends Product {
  public function showAllProducts() {
    $result = $this->fechtAllProducts(); 
    return $result; 
  }
}

