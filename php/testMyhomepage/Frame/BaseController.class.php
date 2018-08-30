<?php

/**
 *BaseController just for simple jump
 */
class BaseController
{

  protected function jump($url = "?",$time = 3){
    header("Refresh:$time;url=$url");
  }
}


?>
