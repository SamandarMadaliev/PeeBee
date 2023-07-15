<?php
class Controller{
  private $response;

  public function __construct($response)
  {
    $this->response = json_decode($response);  
  }
}
?>