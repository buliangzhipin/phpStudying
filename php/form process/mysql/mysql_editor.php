<?php

header("Content-type:text/html;charset=utf-8");


$id = isset($_GET['id']) ? $_GET['id'] : 0;
if($id == 0){
  header("Refresh:3;url=mysql_show.php");
  echo("file doesn\'t exist");
  exit;
}

include_once 'mysql_initial.php';
$sql = "select * from my_comment where id = $id";
$res = my_error($conn,$sql);
if(!$res){
  header("Refresh:3;url=mysql_show.php");
  echo("file doesn\'t exist");
  exit;
}
$comment = mysqli_fetch_assoc($res);

include 'editor.html';



?>
