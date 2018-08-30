<?php


require "DB.class.php";
/**
 *
 */
class Title
{

  private $DB = null;

  function __construct()
  {
    $rootaccount = array(
      'username' =>"root" ,
      'servername' =>"localhost" ,
      'password' =>"Password1",
      'database' =>"mydatabase",
      'charset' =>"utf8"
    );
    $this->DB = new DB($rootaccount);
  }

  public function show($fields=""){
    if(empty($fields)){
      $fields = "*";
    }
    $res = $this->DB->show("select $fields from my_title;");
    $returnArray = array();
    while ($row = mysqli_fetch_assoc($res)) {
      $returnArray[] = $row;
    }

    return $returnArray;
  }

  public function insert($title){
    if(empty($title)){
      echo "title can\'t be empty";
      return false;
    }
    $sql = "insert into my_title values(null,'$title',null);";
    $this->DB->insert($sql);
  }

  public function delete($id){
    $sql = "delete from my_title where id = $id";
    $this->DB->delete($sql);
  }

  public function update($id,$title){
    if(empty($title)){
      echo "title can\'t be empty";
      return false;
    }
    $sql = "update my_title set title = '$title' where id = $id;";
    $this->DB->insert($sql);
  }
}


?>
