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
    public $img;

    function create($data){
        $model = new static();
        $pass=password_hash( $data->password, PASSWORD_DEFAULT, array("cost"=>12));

        $sql="INSERT INTO ".$model->table."( `nombre`, `apellido`, `rut`, `date`, `correo`, `password`, `nivel`) VALUES ( :name , :surname, :rut, :birthdate, :email, :password, 1 )";

        $params = [ ":name" => $data->nombres, ":surname" => $data->apellido, ":rut" => $data->rut, ":birthdate" => $data->birthdate, ":email" => $data->email, ":password" => $pass ];

        return DB::query($sql, $params);

    }
    function edit($data){
        $model = new static();
        $opass=htmlentities(addslashes($data->oldpass));
        $npass=password_hash( $data->newpass, PASSWORD_DEFAULT, array("cost"=>12));
        $user = User::find( $data->email );
        if(password_verify($opass, $user->password)){

            $sql="UPDATE ".$model->table."SET `password`=[ :password ] WHERE `email` = :email AND `password` = :oldpwd";

            $params = [ ":password" => $npass , ":email" => $data->email, ":oldpwd" => $data->oldpass ];

            return DB::query($sql,$params);
        }else{return "error en la contraseña o correo";}
    }
    function isAdmin($correo){
        $user = User::find($correo);
        if ($user->nivel!=2) return true;
        else return false;
    }
}