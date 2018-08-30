<?php
require "Title.class.php";

$titleDB = new Title();
header("Content-type:text/html;charset=utf-8");

if(isset($_GET['option'])){
  header("Refresh:3;url=controller.php");

  switch ($_GET['option']) {
    case 'insert':
      if(isset($_GET['title'])){
        $titleDB->insert($_GET['title']);
        echo "success";
      }else{
        echo "failed";
      }
      break;

    case 'update':
    if(isset($_GET['title']) && isset($_GET['id'])){
      $titleDB->update($_GET['id'],$_GET['title']);
      echo "success";
    }else{
      echo "failed";
    }
    break;

    case 'delete':
    if(isset($_GET['id'])){
      $titleDB->delete($_GET['id']);
      echo "success";
    }else{
      echo "failed";
    }
    break;

    default:
      echo "nothing happened.";
      break;
  }

  exit;
}

$titleInformation = $titleDB->show();

include "view.html";

?>
