<?php

final class DB{
  private static $obj;
  private $connection;
  private db_host;
  private db_user;
  private db_pass;
  private db_name;
  private charset;

  private function __construct(){

  $this->db_host = $GLOBALS['Config']['db_host'];
  $this->db_user = $GLOBALS['Config']['db_user'];
  $this->db_pass = $GLOBALS['Config']['db_pass'];
  $this->db_name = $GLOBALS['Config']['db_name'];
  $this->charset = $GLOBALS['Config']['charset'];

  $this->connectDB();
  $this->setCharset();

  $sql = "set names " . $rootaccount['charset'] . ";";
  $this->my_error($sql);
  $sql = "use " . $rootaccount['database'] . ";";
  $this->my_error($sql);

  }

  public function getInstance(){
    if(!self::obj instanceof self){
      self::obj = new self();
    }

    return self::obj;
  }

  private function connectDB(){
    $this->connection = mysqli_connect(db_host,db_user,db_pass);
    if(!$this->conn){
      echo "connection is failed <br/>";
      echo 'MySQL connection error, error number is: ' . mysqli_errno($this->conn) . '<br/>';
      echo 'MySQL connection error, error message is: ' . mysqli_error($this->conn) . '<br/>';

    }

  }

  private function setCharset(){
    $sql = "set names " . $this->charset . ";";
    $this->queryDB($sql);
  }

  private function useDB(){
    $sql = "use ". $this->db_name . ";";
    $this->queryDB($sql);
  }



  //Packing check error and do query
  //@param1 $conn connection
  //@param1 $sql sql query
  //
  private function queryDB($sql){
    $res = mysqli_query($this->conn,$sql);

    if(!$res){
      echo 'query makes some error' . '<br/>'
      echo 'MySQL quering error, error number is: ' . mysqli_errno($this->conn) . '<br/>';
      echo 'MySQL quering error, error message is: ' . mysqli_error($this->conn) . '<br/>';
      exit;
    }
    return $res;
  }
}

?>
