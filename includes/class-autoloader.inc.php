<?php
  
  spl_autoload_register('myAutoLoader'); 

  function myAutoLoader($classname) {
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
  
    if (strpos($url, 'includes') !== false) {
      $path = '../';
    } else {
      $path = ''; 
    }
  
    $extension = ".class.php";
    $classname = str_replace('\\', '/', $classname); 
    require_once $path . $classname . $extension; 
  }

?>

