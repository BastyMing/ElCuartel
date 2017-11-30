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
    public $oldpass;
    public $npass;


    function create($data){
        $model = new static();
        $pass=password_hash( $data->password, PASSWORD_DEFAULT, array("cost"=>12));

        $sql="INSERT INTO ".$model->table."( `nombre`, `apellido`, `rut`, `date`, `correo`, `password`, `nivel`) VALUES ( :name , :surname, :rut, :birthdate, :email, :password, 1 )";

        $params = [ ":name" => $data->nombres, ":surname" => $data->apellido, ":rut" => $data->rut, ":birthdate" => $data->birthdate, ":email" => $data->email, ":password" => $pass ];

        return DB::query($sql, $params);

    }
    function edit($data1,$data2,$data3){
        $model = new static();
        $oshu = $data2;//oshushacreoqueestoestabamaltodoestetiempoXD
        $oldpass=htmlentities(addslashes($oshu));
        $npass=password_hash( $data3, PASSWORD_DEFAULT, array("cost"=>12));
        $user = User::find( $data1 );
        if(password_verify($oldpass, $user->password)){

            $sql="UPDATE ".$model->table."SET `password`= :password  WHERE `correo` = ':email'";

            $params = [ ":password" => $npass , ":email" => $user->email];

            return DB::query($sql,$params);
        }else{return "nonononono";}
    }
    function isAdmin($correo){
        $user = User::find($correo);
        if ($user->nivel!=2) return true;
        else return false;
    }
    function findall(){
        $model = new static();
        $sql = "SELECT * FROM ".$model->table;
        return DB::queryall($sql);
    }
}