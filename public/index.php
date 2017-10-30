<?php
session_start();
chdir( dirname(__DIR__) );

define("SYS_PATH", "lib/");
define("APP_PATH", "app/");

define('PUBLIC_FOLDER', 'public');
define('SUB_FOLDER', str_replace(PUBLIC_FOLDER, '', dirname($_SERVER['SCRIPT_NAME'])));

define("PUBLIC_PATH", SUB_FOLDER.PUBLIC_FOLDER."/");

require SYS_PATH."init.php";
$carrito = new Carrito();
$app = new App;
