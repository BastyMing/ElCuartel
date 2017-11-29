<?php

class User extends Model{

    protected $table = "usuario";
    protected $primaryKey = "correo";
    
    public $nombre;
    public $apellido;
    public $rut;
    public $birthdate;
    public $email;
    public $password;

    function create($data){
        $model = new static();
        $pass=password_hash( $data->password, PASSWORD_DEFAULT, array("cost"=>12));

        $sql="INSERT INTO ".$model->table."( `nombre`, `apellido`, `rut`, `fecha de nacimiento`, `correo`, `password`, `nivel`) VALUES ( :name , :surname, :rut, :birthdate, :email, :password, 1 )";

        $params = [ ":name" => $data->nombres, ":surname" => $data->apellido, ":rut" => $data->rut, ":birthdate" => $data->birthdate, ":email" => $data->email, ":password" => $pass ];

        return DB::query($sql, $params);

    }
    function edit($data){
        $model = new static();
        $opass=password_hash( $data->newpass, PASSWORD_DEFAULT, array("cost"=>12));
        $npass=password_hash( $data->oldpass, PASSWORD_DEFAULT, array("cost"=>12));

        $sql="UPDATE ".$model->table."SET `password`=[ :password ] WHERE `email` = :email AND `password` = :oldpwd";

        $params = [ ":password" => $data->newpass , ":email" => $data->email, ":oldpwd" => $data->oldpass ];

        return DB::query($sql,$params);
    }
}