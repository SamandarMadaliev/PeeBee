<?php
class Database{
  private $db_type = DBTYPE;
  private $host = DBHOST;
  private $username = DBUSER;
  private $password = DBPASS;
  private $database_name = DBNAME;
  private $conn;

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
