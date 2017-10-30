<?php

class User extends Model{
    protected $table = "usuario";
    protected $primaryKey = "correo";
    public $nombre;
    public $apellido;
    public $rut;
    public $fecha_de_nacimiento;
    public $correo;
    public $password;
    public $nivel;

    public static function login($correo){
        $model = new static();

        $sql = "SELECT * FROM ".$model->table." WHERE ".$model->primaryKey." = :correo";
        $params = ["correo" => $correo];
        $result = DB::query($sql, $params);

        foreach ($result as $key => $value) {
            $model->$key = $value;
        }

        return $model;
    }
}