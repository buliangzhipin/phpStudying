<?php
final class CommentModel{
  private $DB;

  public function __construct(){
    $this->DB = DB::getInstance();
  }

  public function fetchAllComment($pid){
    $sql = "select * from my_comment where pid=$pid order by id asc;";
    $res = $this->DB->queryDB($sql);
    $returnArray = array();
    while($row = mysqli_fetch_assoc($res)){
      $returnArray[] = $row;
    }
    return $returnArray;
  }
}
?>
