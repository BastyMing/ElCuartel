<?php

chdir( dirname(__DIR__) );

define("SYS_PATH", "lib/");
define("APP_PATH", "app/");
define("PUBLIC_PATH", "/lenguajedemarcado/ElCuartel/public/");

require SYS_PATH."init.php";

$app = new App;