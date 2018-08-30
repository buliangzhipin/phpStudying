<?php
final class Frame{
  public static function run(){
    self::initCharset();
    self::initConfig();
    self::initRoute();
    self::initConst();
    self::initAutoloaded();
    self::initDispatch();
  }
  private static function initCharset(){
    header("Content-type:text/html;charset=utf-8");
  }

  private static function initConfig(){
    $GLOBALS['Config'] = require_once("./APP/Conf/Config.php");
  }

  private static function initRoute(){
    define("Plat",isset($_GET['p']) ? $_GET['p'] : $GLOBALS['Config']['default_platform']);
    define("Controller",isset($_GET['c']) ? $_GET['c'] : $GLOBALS['Config']['default_controller']);
    define("Action",isset($_GET['a']) ? $_GET['a'] : $GLOBALS['Config']['default_action']);
  }

  private static function initConst(){
    define("DS",DIRECTORY_SEPARATOR);
    define("ROOT_PATH",getcwd() . DS);
    define("FRAME_PATH",ROOT_PATH . "Frame" . DS);
    define("APP_PATH",ROOT_PATH . "APP" . DS);
    define("CONTROLLER_PATH",APP_PATH . Plat . DS ."Controller" . DS);
    define("MODEL_PATH",APP_PATH . Plat . DS ."Model" . DS);
    define("VIEW_PATH",APP_PATH . Plat . DS . "View" . DS . Controller . DS);

  }

  private static function initAutoloaded(){
    spl_autoload_register(function($className){
      $arr = array(
        FRAME_PATH . "$className.class.php",
        MODEL_PATH . "$className.class.php",
        CONTROLLER_PATH . "$className.class.php"
      );
      foreach($arr as $filename){
        if(file_exists($filename)) require_once($filename);
      }
    });
  }

  private static function initDispatch(){
    $controllerClassName = Controller ."Controller";
    $controllerObj = new $controllerClassName();

    $actioname = Action;
    $controllerObj->$actioname();
  }
}

?>
