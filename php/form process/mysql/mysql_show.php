<?php

include_once 'mysql_initial.php';

$sql = "select * from my_comment;";

$res = my_error($conn,$sql);

//iterator of the array
$comment = array();

while ($row = mysqli_fetch_assoc($res)) {
  $comment[] = $row;
}

include 'show.html';

?>
