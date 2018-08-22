<?php


//Add the comment

//Check maincontent
$text = isset($_POST['text']) ? htmlspecialchars($_POST['text'],ENT_QUOTES):'';
$author = isset($_POST['author'])?$_POST['author']:'Nameless';


if(empty($text)){
  header('Refresh:3;url=add.html');

  exit('Text can\'t be empty');
}

//initial the sql
require 'mysql_initial.php';

//insert into database
$time = date("Y-m-d H:i:s");
$sql = "insert into my_comment values(null,'$author','$text',CURRENT_TIMESTAMP);";

my_error($conn,$sql);

header('Refresh:3;url=add.html');
exit('success');

?>
