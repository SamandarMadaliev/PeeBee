<?php
// private $db = new Database;

class Message {
  private $bot;
  private $msg;
  private $kyb;
  public function __construct($chat_id)
  {
    $this->bot = new Bot(BOT_TOKENT);
    $this->bot->chat_id = $chat_id;
    $this->msg = new Texts;
    $this->kyb = new Keyboard;
  }

  public function start($res){
    $this->kyb->type = "inline_keyboard";
    $this->bot->sendMessage($this->msg->welcome(), $this->kyb->kyb("homeInline"));
  }
}