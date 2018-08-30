<?php

$main = isset($_POST['main'])?$_POST['main']:"";
$id = isset($_GET['id'])?$_GET['id']:"???";

echo $main;
echo $id;
// if($main == ""){
//   header('Content-type:text/html;charset=utf-8');
//   header("Refresh:3;url=show.php");
//   exit("Main title can\'t be empty.");
// }
//
// if(is_dir($main)){
//   header('Content-type:text/html;charset=utf-8');
//   header("Refresh:3;url=show.php");
//   exit("Directory is existing.");
// }


// include_once "mysql_initial.php";
//
// $sql = "insert into my_page values('$main');";
// $res = my_error($conn,$sql);
// mkDir($main);
// header("Refresh:3;url=show.php");
echo "success";

?>
