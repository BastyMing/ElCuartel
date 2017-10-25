<?php

class Model{
    protected $table;
    protected $primaryKey = "id";
    protected $products_per_page=4;
    
    public static function find($id){
        $model = new static();

        $sql = "SELECT * FROM ".$model->table." WHERE ".$model->primaryKey." = :id";
        $params = ["id" => $id];
        $result = DB::query($sql, $params);

        foreach ($result as $key => $value) {
            $model->$key = $value;
        }

        return $model;
    }
}