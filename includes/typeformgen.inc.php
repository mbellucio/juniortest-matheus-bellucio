<?php

include "class-autoloader.inc.php";

if (isset($_POST['productType'])) {
  $productTypeString = $_POST['productType'];
  $productType = new ReflectionClass($productTypeString);
  $productTypeInstance = $productType->newInstance();
  
  $view = new classes\view\ProductView();
  $html = $view->handleForm($productTypeInstance);
  
  echo $html;
}

exit();


