<?php
    
class ProductController extends Product{
  public function addProduct(ProductControllerInterface $productType, $sku, $name, $price, ...$params) {
    $productType->setProduct($sku, $name, $price, ...$params);
  }

  public function massDelete($products) {
    $this->setProductsToDelete($products);
    $this->deleteProducts(); 
  }

  public function checkSku($sku) {
    return $this->skuExists($sku);
  }
}

