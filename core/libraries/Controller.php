<?php
class Controller
{
  public $response;
  private $requireMethodFile;
  private $loadClassByName;
  protected $method;
  public function __construct($response)
  {
    $this->response = json_decode($response);

    if (isset($this->response->message) and file_exists(ROOT . "/bot/core/methods/Message.php")) {
      $this->requireMethodFile = ROOT . "/bot/core/methods/Message.php";
      $this->loadClassByName = "Message";
    } else if (isset($this->response->callback_query) and file_exists(ROOT . "/bot/core/methods/CallbackQuery.php")) {
      $this->requireMethodFile = ROOT . "/bot/core/methods/CallbackQuery.php";
      $this->loadClassByName = "CallbackQuery";
    } else {
      throw new LogicException("Unable to load method file");
    }

    require_once $this->requireMethodFile;

    $this->method = new $this->loadClassByName;
  }
}
