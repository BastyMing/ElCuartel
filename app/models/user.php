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

    function create($data){
        $model = new static();

        $sql="INSERT INTO ".$model->table."( nombre, apellido, rut, fecha_de_nacimiento, correo, password, nivel ) VALUES ( :name , :surname, :rut, :birthdate, :email, :password, 1 )";

        $params = [ "name" => $data->nombres, "surname" => $data->apellido, "rut" => $data->rut, "birthdate" => $data->birthdate, "email" => $data->email, "password" => $data->password ];

        return DB::query($sql, $params);

    }
}