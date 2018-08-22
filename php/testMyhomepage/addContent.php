<?php

$main = isset($_POST['main'])?$_POST['main']:"";

if($main == ""){
  header('Content-type:text/html;charset=utf-8');
  header("Refresh:3;url=myhomePage.html");
  exit("Main title can\'t be empty.");
}

if(is_dir($main)){
  header('Content-type:text/html;charset=utf-8');
  header("Refresh:3;url=myhomePage.html");
  exit("Directory is existing.");
}


include_once "mysql_initial.php";

$sql = "insert into my_page values('$main');";
$res = my_error($conn,$sql);
mkDir($main);
header("Refresh:3;url=myhomePage.html");
echo "success";

?>
