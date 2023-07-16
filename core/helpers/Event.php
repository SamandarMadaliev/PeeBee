<?php
require_once "./core/libraries/Bot.php";
require_once "./core/libraries/Database.php";
class Event implements Bot
{
  private $db;
  public function __construct()
  {
    $this->db = new Database();
  }
  // Funcition to change the event code of the user
  public function code()
  {
    
  }

}
