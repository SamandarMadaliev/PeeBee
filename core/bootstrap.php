<?php
  require "./core/configs/config.php";

  spl_autoload_register(function($className){
    if(file_exists("./core/libraries/$className.php")){
      require_once "./core/libraries/$className.php";
    }else if(file_exists("./core/helpers/$className.php")){
      require_once "./core/helpers/$className.php";
    }
  });