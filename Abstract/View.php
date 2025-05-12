<?php

abstract class View{

private static $basePath = "../App/View/";

public static function render($path, $data = []){
    extract($data);
    // check if file exists first and return an error if not
    require static::$basePath . $path . ".php";
}

}

?>