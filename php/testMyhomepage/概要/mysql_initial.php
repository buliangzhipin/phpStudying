<?php
header('Content-type:text/html;charset=utf-8');
$servername = 'localhost';
$username = 'root';
$password = 'Password1';


$conn = mysqli_connect($servername,$username,$password);
// or constructor $conn = mysqli_connect($servername,$username,$password);

if(!$conn){
  die('Connection failed: ' . mysqli_connct_error());
}else {
  // connect is success
}
$sql = "set names utf8;";
my_error($conn,$sql);
$sql = "use mydatabase;";
my_error($conn,$sql);


//Packing check error and do query
//@param1 $conn connection
//@param1 $sql sql query
function my_error($conn,$sql){
  $res = mysqli_query($conn,$sql);
  if(!$res){
    echo 'MySQL quering error, error number is: ' . mysqli_errno($conn) . '<br/>';
    echo 'MySQL quering error, error message is: ' . mysqli_error($conn) . '<br/>';

    exit;
  }
  return $res;
}

?>
