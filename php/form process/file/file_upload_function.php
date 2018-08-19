<?php

$file = $_FILES['image'];
$path = "./";
$allow_type = array('image/jpg','image/jpeg','image/gif','image/pjpeg');
$allow_format = array('jpg','gif','jpeg');

if($filename = upload_single($file,$allow_type,$path,$error,$allow_format)){
    echo $filename;
}else{
  echo $error;
}

/*
*upload one file
*@param1 array $file,array(name,tmp_name,error,size,type)
*@param2 array $allow_type
*@param3 string $path, the path to sava the file
*@param4 string &$error, the reason causing error
*@param5 array $allow_format = array()
*@param6 int $max_size = 2000000
*/
  function upload_single($file,$allow_type,$path,&$error,$allow_format=array(),$max_size=2000000)
{
  //@1 check if it's an uploaded file
  if(!is_array($file)||!isset($file['error'])){
    //unvalid file
    $error = 'Not a valid file';
    return false;
  }

  // @1 check if there is any error
  switch ($file['error']) {
    case 1:
      // code...
      break;
    case 2:
      $error = 'Size is too big';
      return false;
    case 3:
      $error = 'Uploading is failed,there is only a part of file is uploaded';
      return false;
    case 4:
      $error = 'User doesn\'t select a file';
      return false;
    case 6:
    case 7:
      $error = 'Save is failed';
      return false;
  }

  //@2 check the path
  if(!is_dir($path)){
    //not a valid path
    $error = 'Path doesn\'t exist';
    return false;
  }

  // @2 check if satisfy the content-type
  if(!in_array($file['type'],$allow_type)){
    //not an allowed type
    $error = 'Type isn\'t allowed';
    return false;
  }

  //@2 check the suffix name
  //@2 extract the suffix name
  $ext = ltrim(strrchr($file['name'],'.'),'.');
  if(empty($allow_format) && !in_array($ext,$allow_format)){
    //not an allowed type
    $error = 'Type isn\'t allowed';
    return false;
  }

  //@2 check the file size
  if($file['size'] > $max_size){
    //not an allowed type
    $error = 'Size is too big.Allowd size is under' . $max_size . 'bytes.';
    return false;
  }

  // @3 tmpfile
  if(!is_uploaded_file($file['tmp_name'])){
    //is not the uploaded file
    $error = 'Uploading is failed';
    return false;
  }


  //@3 move to new file(for preventing conflict change the name to a random name)
  $fullname = strstr($file['type'],'/',TRUE) . date('Ymd');
  //random name
  for($i = 0;$i < 4;$i++){
    $fullname .= chr(mt_rand(65,90));
  }
  echo $ext;
  $fullname .= '.' . $ext;

  if(move_uploaded_file($file['tmp_name'],$path . '/' . $fullname)){
    return $fullname;
  }else{
    // moving is failed
    $error = 'Uploading is failed';
    return false;
  }

}

?>
