<?php
session_start();
define('THINK_PATH','./ThinkPHP/');
define('APP_PATH','./admin/');
define('APP_NAME','admin');
define('APP_DEBUG',true); 
define("COMMONPATH", "./public/Common/");
define("PUBLICPATH", "__ROOT__/public");
require THINK_PATH.'ThinkPHP.php';

//App::run();
?>