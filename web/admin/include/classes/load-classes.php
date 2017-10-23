<?php 

$path = dirname(__FILE__);

 require_once('db.php');
 $db = new Db;

foreach (glob($path ."/class.*.php") as $file) {

    $filename = basename($file);

    require_once($filename);

	$len = strlen($filename) - 10;

	$classname= substr($filename,6,$len);

	$class = ucfirst($classname);

	$$classname = new $class;

}


?>