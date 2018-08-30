<?php

function my_scandir($dir,$level = 0){
  //for the safety, if it's not a dictory we stop;
  if(!is_dir($dir))dir("<p>\n" . $dir . '\n</p>\n');

  // find files in dictory
  $files = scandir($dir);

  //traversal of directory
  foreach ($files as $file) {
    if($file == "." | $file == ".."){
      continue;
    }

    $filedir = $dir . "/" . $file;

    if(is_dir($filedir)){
      print "<p><a class='directory' href='$filedir'>\n";
    }else{
      print "<p><a href='$filedir'>\n";
    }
    print str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;",$level) . "$file" . "\n</a></p>\n";
    //check if it's a dictory
    if(is_dir($filedir)){
      my_scandir($filedir,$level+1);
    }

  }
}

print <<<EOF
<style>
.directory {
  color:#ff0000;
}
</style>

EOF;

//test
my_scandir(".")



?>
