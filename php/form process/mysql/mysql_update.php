<?php

header("Content-type:text/html;charset=utf-8");

$comment = isset($_POST['text']) ? htmlspecialchars($_POST['text'],ENT_QUOTES):'';
$author = isset($_POST['author'])?$_POST['author']:'Nameless';
$id = isset($_POST['id'])?intval($_POST['id']):0;

if(empty($comment)){
  header('Refresh:3;url=add.html');

  exit('Text can\'t be empty');
}

if($id == 0){
  header('Refresh:3;url=add.html');

  exit('File doesn\t exist.');
}

include_once 'mysql_initial.php';

$sql = "update my_comment set author = '$author',comment = '$comment' where id = $id;";
my_error($conn,$sql);

header('Refresh:3;url=mysql_show.php');

echo "update is success.";

?>
