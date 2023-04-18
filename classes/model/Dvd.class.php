<?php
  
  namespace classes\model;
  
  class Dvd extends Product implements ProductTypeInterface {

    public function setProduct($sku, $name, $price, ...$params) {
      $this->setSku($sku); 
      $this->setName($name); 
      $this->setPrice($price);
      $mb = $params[0]; 
      $mbatt = "Size: " . $mb . " MB"; 
      $this->setProductAttribute($mbatt); 

      $this->saveProduct(); 
    }

    public function generateForm() {
      $html = '<div class="col-12 form-row additional-form">';
      $html .= '<h5 class="form-label">Size (MB)</h5>'; 
      $html .= '<input type="number" class="form-control form-default-input" placeholder="size" aria-label="NAME" id="size">';
      $html .= '<span id="size-feedback"></span>'; 
      $html .= '</div>';
      $html .= '<p class="guidance-msg">Please provide the storage size in MB</p>';
  
      return $html; 
    }
  }

