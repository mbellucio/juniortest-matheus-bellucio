<?php

abstract class Product extends Dbh{
  private $sku;
  private $name; 
  private $price;
  private $productAttribute; 
  private $productsToDelete; 

  protected function getSku() {
    return $this->sku; 
  }

  protected function setSku($sku) {
    $this->sku = $sku; 
  }

  protected function getName() {
    return $this->name; 
  }

  protected function setName($name) {
    $this->name = $name; 
  }

  protected function getPrice() {
    return $this->price; 
  }

  protected function setPrice($price) {
    $this->price = $price; 
  }

  protected function getProductAttribute() {
    return $this->productAttribute; 
  }

  protected function setProductAttribute($productAttribute) {
    $this->productAttribute = $productAttribute; 
  }

  protected function getProductsToDelete() {
    return $this->productsToDelete; 
  }

  protected function setProductsToDelete( array $productsToDelete) {
    $this->productsToDelete = $productsToDelete; 
  }

  protected function fechtAllProducts() {
    $sql = "SELECT * FROM products";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();

    $result = $stmt->fetchAll(); 
    return $result; 
  }

  protected function saveProduct() {
    $sql = "INSERT INTO products (products_sku, products_name, products_price, products_attribute) VALUES (?, ?, ?, ?)";
    $stmt = $this->connect()->prepare($sql); 
    $stmt->execute([$this->getSku(), $this->getName(), $this->getPrice(), $this->getProductAttribute()]); 
  }

  protected function deleteProducts() {
    foreach($this->getProductsToDelete() as $product) {
      $sql = "DELETE FROM products WHERE products_sku = ?";
      $stmt = $this->connect()->prepare($sql); 
      $stmt->execute([$product]);
    }
  }

  protected function skuExists($sku) {
    $sql = "SELECT COUNT(*) FROM products WHERE products_sku = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$sku]);
  
    $result = $stmt->fetchColumn();
    if ($result > 0) {
      return true;
    } else {
      return false; 
    }
  }
}

