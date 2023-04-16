<?php
    
class ProductController extends Product{
  public function addProduct(ProductControllerInterface $productType, $sku, $name, $price, ...$params) {
    $productType->setProduct($sku, $name, $price, ...$params);
  }
}

