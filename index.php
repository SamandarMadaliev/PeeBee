<?php
  require_once "./core/bootstrap.php";
  $controller = new Controller(file_get_contents("php:input"));
  $bot = new Bot("5537317062:AAF5l5oQwtlGFNTCl7MoBFIJEFBzA-gq9rQ");
  
  $bot->chat_id = "1124955251";
  echo $bot->sendMessage("This is testing message for a new telegram framework");