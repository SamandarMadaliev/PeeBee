<?php
class Database
{
  private $host = DBHOST;
  private $username = DBUSER;
  private $password = DBPASS;
  private $database_name = DBNAME;

  private $conn;
  private $stmt;

  public function __construct()
  {
    $this->conn = null;
    $dsn = "mysql:host=$this->host;dbname=$this->database_name";

    try {

      $this->conn = new PDO($dsn, $this->username, $this->password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);

    } catch (PDOException $error) {
      echo "Connection Error: ".$error->getMessage();
    }
  }

  // Prepare statement with query
  public function query($sql)
  {
    $this->stmt = $this->conn->prepare($sql);
  }

  // Bind values
  public function bind($param, $value, $type = null)
  {
    if (is_null($type)) {
      switch (true) {
        case is_int($value):
          $type = PDO::PARAM_INT;
          break;
        case is_bool($value):
          $type = PDO::PARAM_BOOL;
          break;
        case is_null($value):
          $type = PDO::PARAM_NULL;
          break;
        default:
          $type = PDO::PARAM_STR;
      }
    }

    $this->stmt->bindValue($param, $value, $type);
  }


  // Execute The prepared statement
  public function execute()
  {
    return $this->stmt->execute();
  }

  // Get result set as array of objects
  public function resultSet($type = PDO::FETCH_OBJ)
  {
    $this->execute();
    return $this->stmt->fetchAll($type);
  }

  public function single($type = PDO::FETCH_OBJ)
  {
    $this->execute();
    return $this->stmt->fetch($type);
  }

  public function rowCount()
  {
    return $this->stmt->rowCount();
  }
}
