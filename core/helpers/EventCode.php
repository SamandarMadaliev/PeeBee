<?php
require_once "./core/libraries/Database.php";

class EventCode
{
  private $db;
  private $chatId;
  public function __construct($chatId)
  {
    $this->db = new Database();
    $this->chatId = $chatId;
  }
  // Funcition to change the event code of the user
  public function change()
  {
    
  }

  public function eventCode()
  {
    return "start";
  }
}
