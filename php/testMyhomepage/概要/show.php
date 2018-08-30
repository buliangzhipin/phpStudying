<?php

// include_once "mysql_initial.php";
// $sql = "select * from my_page";
// $res = my_error($conn,$sql);
// $result = array();
// while ($row = mysqli_fetch_assoc($res)) {
//   $result[] = $row;
// }
//
// include "addAndShow.html";


include_once "DB.class.php";
$db = new DB();
$db->show();
?>
