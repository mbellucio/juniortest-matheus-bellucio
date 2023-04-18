<?php
  
  namespace classes\model;
  use classes\model\Product;
  
  class Furniture extends Product implements ProductTypeInterface {

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

    public function generateForm() {
      $html = '<div class="col-12 form-row additional-form">';
      $html .= '<h5 class="form-label">Height (cm)</h5>'; 
      $html .= '<input type="number" class="form-control form-default-input" placeholder="height" aria-label="NAME" id="height">'; 
      $html .= '<span id="height-feedback"></span>';
      $html .= '</div>';
      $html .= '<div class="col-12 form-row additional-form">';
      $html .= '<h5 class="form-label">Width (cm)</h5>'; 
      $html .= '<input type="number" class="form-control form-default-input" placeholder="width" aria-label="NAME" id="width">'; 
      $html .= '<span id="width-feedback"></span>';
      $html .= '</div>';
      $html .= '<div class="col-12 form-row additional-form">';
      $html .= '<h5 class="form-label">Length (cm)</h5>'; 
      $html .= '<input type="number" class="form-control form-default-input" placeholder="length" aria-label="NAME" id="length">'; 
      $html .= '<span id="length-feedback"></span>';
      $html .= '</div>';
      $html .= '<p class="guidance-msg">Please provide the furniture measurements in centimeters (cm)</p>';
  
      return $html; 
    }
  }
