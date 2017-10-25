<?php

class DB{
    private function __construct(){}

    public static function query($sql,$params = []){
        $statament = static::connection()->prepare($sql);
        $statament->execute($params);
        $result = $statament->fetch();
        return $result;
    }

    public static function queryall($sql,$params = []){
        $statament = static::connection()->prepare($sql);
        $statament->execute($params);
        return $statament;
    }

    private static function connection(){
        return new PDO("mysql:host=localhost;dbname=pdi","root","");
    }
}