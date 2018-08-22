<?php

header("Content-type:text/html;charset=utf-8");

$filename = 'test.png';
//response header
header("Content-type:application/octem-stream"); //file stream
header("Accept-ranges:bytes"); //transform as bytes
header("Content-disposition:attachment;filename=$filename");
header("Accept-length:" . filesize($filename));

//if file is very big
$f = @fopen($filename,'r') or die();
while($row = fread($f,1024)){
  echo $row;
}

while(!feof($f)){
  echo fread($f,1024);
}

//if file is very small
// echo file_get_contents($filename);
?>
