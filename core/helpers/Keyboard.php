<?php

class Keyboard
{
  private $keyboard;
  public $type;

  protected function home()
  {
    return ["resize_keyboard"=>true, "$this->type" => [[["text" => "Home"]]]];
  }
  protected function inlineHome()
  {
    return ["$this->type" => [[["text" => "Home", "callback_data"=>"data"]]]];
  }

  public function kyb($name)
  {
    if (method_exists("Keyboard", $name)) {
      $this->keyboard = $this->$name();
      return json_encode($this->keyboard);
    }
  }
}
