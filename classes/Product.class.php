<?php

abstract class Product extends Dbh{
  private $sku;
  private $name; 
  private $price;
  private $productAttribute; 

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
}

