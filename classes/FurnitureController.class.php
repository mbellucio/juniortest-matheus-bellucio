<?php
  
  class FurnitureController extends Product implements ProductControllerInterface {

    public function setProduct($sku, $name, $price, ...$params) {
      $this->setSku($sku); 
      $this->setName($name); 
      $this->setPrice($price);
      $H = $params[0];
      $W = $params[1];
      $L = $params[2]; 
      $dimatt = "Dimension: " . $H . "x" . $W . "x" . $L; 
      $this->setProductAttribute($dimatt); 

      $this->saveProduct(); 
    }
  }
