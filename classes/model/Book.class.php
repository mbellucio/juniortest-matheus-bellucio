<?php
  
  namespace classes\model;

  class Book extends Product implements ProductTypeInterface {

    public function setProduct($sku, $name, $price, ...$params) {
      $this->setSku($sku); 
      $this->setName($name); 
      $this->setPrice($price);
      $kg = $params[0]; 
      $kgatt = "Weight: " . $kg . "KG"; 
      $this->setProductAttribute($kgatt); 

      $this->saveProduct(); 
    }

    public function generateForm() {
      $html = '<div class="col-12 form-row additional-form">';
      $html .= '<h5 class="form-label">Weight (KG)</h5>'; 
      $html .= '<input type="number" class="form-control form-default-input" placeholder="book weight" aria-label="NAME" id="weight">'; 
      $html .= '<span id="weight-feedback"></span>';
      $html .= '</div>';
      $html .= '<p class="guidance-msg">Please provide the weight in KG</p>';
  
      return $html; 
    }
  }
