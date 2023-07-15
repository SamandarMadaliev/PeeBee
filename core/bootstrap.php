<?php
  require "./core/configs/config.php";

  spl_autoload_register(function($className){
    require_once "../core/libraries/$className.php";
  });