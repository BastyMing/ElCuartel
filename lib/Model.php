<?php

class Model{
    protected $table;
    protected $primaryKey = "id";
    
    public static function find($id){
        $model = new static();

        $sql = "SELECT * FROM ".$model->table." WHERE ".$model->primaryKey." = :id";
        $params = ["id" => $id];
        $result = DB::query($sql, $params);
        if (!$result) {
            return false;
        }
        foreach ($result as $key => $value) {
            if (is_numeric($key)) {
              unset($result->$key);
            }else{
                $model->$key = $value;
            }
        }

        return $model;
    }
}