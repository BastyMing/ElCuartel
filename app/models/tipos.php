<?php

class Tipos extends Model{
    protected $table = "tipos";
    protected $primaryKey = "id";
    
    public $tipo;
    public $iol;
    
    public static function findall(){
        $model = new static();
        $sql = "SELECT * FROM ".$model->table;
        return DB::queryall($sql);
    }
}