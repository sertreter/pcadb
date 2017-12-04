<?php
/**
 * Created by PhpStorm.
 * User: janze
 * Date: 14.11.2017
 * Time: 0:11
 */
function __autoload ($class_name){

    $array_paths = array(
        '/models/',
        '/helpers/',
        '/components/'
    );

    foreach ($array_paths as  $path){
        $path = ROOT.$path.$class_name.".php";
        if(is_file($path)){
            include_once $path;
        }
    }
}