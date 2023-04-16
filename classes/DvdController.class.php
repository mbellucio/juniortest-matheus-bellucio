<?php
  
  class DvdController extends Product implements ProductControllerInterface {

    public function setProduct($sku, $name, $price, ...$params) {
      $this->setSku($sku); 
      $this->setName($name); 
      $this->setPrice($price);
      $mb = $params[0]; 
      $mbatt = "Size: " . $mb . " MB"; 
      $this->setProductAttribute($mbatt); 

      $this->saveProduct(); 
    }
  }

 