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