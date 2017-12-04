<?php
// Точка входу
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);
define('ROOT', dirname(__FILE__));
define('PAGE_PAGINATION', 6);
require_once ROOT."/components/Autoload.php";
$router = new Router();
$router->run();