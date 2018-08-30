<?php

/**
 *
 */
final class ModelFactory
{
  private static $modelArray = array();

  public static function getInstance($modelName){
    if(!isset(self::$modelArray["$modelName"])){
      $modelArray["$modelName"] = new $modelName();
    }
    return self::$modelArray["$modelName"];
  }
}


?>
