<?php

//conexion con mysqli
//mysqli_connect( @HOST@, @USERNAME@, @PASSWORD@, @TABLENAME@ );

//host al que se conecta
$HOST = "127.0.0.1";
//nombre de usuario mysql
$USERNAME = "root";
//password mysql
$PASSWORD = "";

//nombre de la table usada en mysql
$TABLENAME = "pdi";

$conexion = mysqli_connect($HOST, $USERNAME, $PASSWORD, $TABLENAME)
                OR die('No pudo conectarse: ' . mysqli_error($conexion));

class DB { 
    private static $servername  = 'localhost';
    private static $username  = 'root'; 
    private static $password   = '';
    private static $db   = 'pdi';
    private static $port   = 3306;
    private static $con = NULL;
    private static $cantidad_por_pagina = 4;


    public static function open(){
        DB::$con = mysqli_connect(DB::$servername, DB::$username, DB::$password,DB::$db,DB::$port); 
        return DB::$con;        
    }

    public static function runQRY($qry){
        return mysqli_query(DB::$con,$qry);
    }

    public static function getProducts( $pagina = 1 ){
        $cantidad_por_pagina = DB::$cantidad_por_pagina;
        $empezar_desde = ($pagina-1) * $cantidad_por_pagina;
        $consulta_resultados = DB::runQRY("SELECT * FROM `local` ORDER BY `codigo` ASC 
                LIMIT $empezar_desde, $cantidad_por_pagina") or die("No se encontro");
        return $consulta_resultados;
    }

    public static function getTotalPages(){
        $total = DB::runQRY("SELECT COUNT(*) as `count` FROM `local`");
        $total = $total->fetch_object();
        return ceil($total->count / DB::$cantidad_por_pagina);
    }

    public static function close(){
        DB::$con->close();
    }
}