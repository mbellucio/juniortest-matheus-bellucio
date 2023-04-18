<?php

namespace classes\model;

interface ProductTypeInterface {
  public function setProduct($sku, $name, $price, ...$params);
  
  public function generateForm();
} 


