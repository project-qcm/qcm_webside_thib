<?php

class App
{

  static $db = null;

  static function getDatabase()
  {
    if (!self::$db) {
      self::$db = new Database($_ENV["MYSQL_USER"], $_ENV["MYSQL_PASSWORD"], $_ENV["MYSQL_DATABASE"]);
    }

    return self::$db;
  }

  // static function getAuth()
  // {
  //     return new Auth(Session::getInstance());
  // }

  static function redirect($page)
  {
    // $path = realpath($page);
    $path = strtolower($page);
    header("Location: $path");
  }

  static function renameUploadFile($file, $nameInput)
  {
    $temp = explode(".", $file["$nameInput"]["name"]);
    $newfilename = round(microtime(true)) . '.' . end($temp);
    return $newfilename;
  }
  
  static function echotest()
  {
    echo "App !";
  }
}
