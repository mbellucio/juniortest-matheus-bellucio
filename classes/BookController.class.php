<?php
  
  class BookController extends Product implements ProductControllerInterface {

    public function setProduct($sku, $name, $price, ...$params) {
      $this->setSku($sku); 
      $this->setName($name); 
      $this->setPrice($price);
      $kg = $params[0]; 
      $kgatt = "Weight: " . $kg . "KG"; 
      $this->setProductAttribute($kgatt); 

      $this->saveProduct(); 
    }
  }
