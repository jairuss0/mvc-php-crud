<?php

spl_autoload_register(function($class) {
    
    $class = str_replace('\\', '/', $class); // Convert namespace to path
    
    $file = '../app/' . $class . '.php';
    
    if (file_exists($file)) {
        require_once $file;
    }
    else{
      echo "File ". $file. ' does not exist.';
    }
  });
?>