<?php
final class PageModel{
  private $DB;

  public function __construct(){
    $this->DB = DB::getInstance();
  }

  public function fetchAllTitle(){
    $sql = "select * from my_title order by id asc;";
    $res = $this->DB->queryDB($sql);
    $returnArray = array();
    while($row = mysqli_fetch_assoc($res)){
      $returnArray[] = $row;
    }
    return $returnArray;
  }

  public function fetchAllSubtitle($pid){
    $sql = "select (id,subtitle) from my_subtitle where pid=$pid order by id asc;";
    $res = $this->DB->queryDB($sql);
    $returnArray = array();
    while($row = mysqli_fetch_assoc($res)){
      $returnArray[] = $row;
    }
    return $returnArray;
  }

  public function fetchOneSubtitle($id){
    $sql = "select text from my_subtitle where id=$id order by id asc;";
    $res = $this->DB->queryDB($sql);
    $row = mysqli_fetch_assoc($res);
    return $row['text'];
  }
}
?>
