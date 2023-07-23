<?php
  require_once "./core/bootstrap.php";
  $controller = new Controller(file_get_contents("php://input"));
  $bot = new Bot("");
  // $bot->chat_id = "1124955251";
  $bot->setWebhook();
  // echo $bot->sendMessage("This is testing message for a new telegram framework");
  ?>