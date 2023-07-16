<?php
class Database{
  private $db_type;
  private $host;
  private $username;
  private $password;
  private $database_name;
  private $conn;

  public function __construct($db_type = "mysql", $host, $username, $password, $database_name)
  {
    $this->db_type = $db_type;
    $this->host = $host;
    $this->username = $username;
    $this->password = $password;
    $this->database_name = $database_name;
  }

  protected function connect(){
    $this->conn = null;
    try{
      $dsn = "$this->db_type:host=$this->host;dbname=$this->database_name";
      $this->conn = new PDO($dsn, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
    }catch(PDOException $error){
      echo "Connection Error: $error";
    }

  }

}
