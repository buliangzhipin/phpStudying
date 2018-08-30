<?php

final class PageController extends BaseController{
  public function __construct(){

  }

  public function index(){
    $pageModel = new PageModel();
    $pageTitle = $pageModel->fetchAllTitle();
    $defaultID = 1;
    $text = $pageModel->fetchOneSubtitle($defaultID);
    $commentModel = new CommentModel();
    $comment = $commentModel->fetchAllComment($defaultID);

    include VIEW_PATH . "index.html";
  }

  public function showSubtitle(){

  }
}

?>
