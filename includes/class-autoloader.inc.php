<?php
  
  spl_autoload_register('myAutoloader'); 

  function myAutoLoader($classname) {
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

    if (strpos($url, 'includes') !== false) {
      $path = '../classes/';
    } else {
      $path = 'classes/'; 
    }

    $extension = ".class.php";
    require_once $path . $classname . $extension; 
  }

?>

