<?php
class Controller
{
  public $response;
  public $chatId;
  public $resData;
  private $requireMethodFile = ROOT . "/bot/core/methods/Message.php";
  private $method = "Message";
  private $code;
  private $methodClass;

  public function __construct($response)
  {
    $this->response = json_decode($response);
    if (isset($this->response->message) and file_exists(ROOT . "/bot/core/methods/Message.php")) {

      $this->chatId = $this->response->message->from->id;
      $this->resData = $this->response->message->text;

    } else if (isset($this->response->callback_query) and file_exists(ROOT . "/bot/core/methods/CallbackQuery.php")) {

      $this->requireMethodFile = ROOT . "/bot/core/methods/CallbackQuery.php";
      $this->method = "CallbackQuery";
      $this->chatId = $this->response->callback_query->from->id;
      $this->resData = $this->response->callback_query->data;

    } else {
      throw new LogicException("Unable to load method file");
    }

    $codeClass = new EventCode($this->chatId);
    $this->code = $codeClass->eventCode();

    require_once $this->requireMethodFile;
    $this->methodClass = new $this->method ($this->chatId);

    if(method_exists($this->methodClass, $this->code)){
      call_user_func_array(array($this->methodClass, $this->code), array($this->resData));
    }else{
      die("Method does not exist");
    }
  }
}
