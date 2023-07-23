<?php
/**
* This Class Will have all the method to work with Telegram bot
* Put your Bot Token Whene you initialize a bot 
* Example: $bot = new Bot($token);
*/
class Bot
{
  private $token;
  private $content;
  public $response;
  public $chat_id;

  public function __construct($token)
  {
    $this->token = $token;
  }

  protected function sendRequest($method)
  {
    $options = array(
      'http' =>
      array(
        'method'  => 'POST',
        'header'  => 'Content-Type: application/x-www-form-urlencoded',
        'content' => http_build_query($this->content) 
      )
    );
    $context  = stream_context_create($options);
    $this->response = file_get_contents("https://api.telegram.org/bot$this->token/$method", false, $context);
  }

  public function setWebhook(){
    $this->content = array(
      "url"=>UROOT
    );
    $this->sendRequest("setWebhook");
    echo $this->response;
  }
  public function getWebhookInfo(){
    $this->sendRequest("getWebhookInfo");
    echo $this->response;
  }

  public function sendMessage($message, $keyboard = null) {
    $this->content = array(
      "chat_id"=>$this->chat_id,
      "text"=>$message,
      "reply_markup"=>$keyboard,
      "parse_mode"=>"HTML"
    );
    return $this->sendRequest("sendMessage");
  }
}
