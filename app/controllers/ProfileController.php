<?php

class ProfileController extends Controller
{
    public function actionIndex()
    {
        $user = User::find( $_SESSION["USERHASH"] );
        Response::render("menu",["title"=>"Usuario"]);
        Response::render("accessControl/perfil",["user" => $user]);
        Response::render("footer");
    }
    public function actionEditP()
    {
    	$user = User::find($_SESSION["USERHASH"]);
        Response::render("menu",["title"=>"Contraseña"]);
        Response::render("accessControl/EditP",["user" => $user]);
        Response::render("footer");
    }
    public function actionAg(){
         $user = User::find($_SESSION["USERHASH"]);
         Response::render("menu",["title"=>"edicion"]);
         Response::render("accessControl/MasP",["user" => $user]);
         Response::render("footer");
    }
    function actionMetertodo(){
        if(User::find( $_SESSION["USERHASH"] )){
            $img   = $_REQUEST['img'];
            $ddc  = $_REQUEST['ddc'];
            $cel = $_REQUEST['cel'];
            $abt= $_REQUEST['abt'];
            $user = User::find( $_SESSION["USERHASH"] );
            if ( $user ) {
            $model = new static();

            $sql="UPDATE `usuario` SET `direccion`= :ddc ,`img`= :img ,`celular`= :cel ,`abitabout`= :abt WHERE `usuario`.`id` = :id";

            $params = [ ":ddc" => $ddc, ":img" => $img, ":cel" => $cel, ":abt" => $abt, ":id" => $user->id];

            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=datos añadidos");

            return DB::query($sql, $params);
            }else{header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=no esta iniciada la seicion");}
        }
    }

    public function actionCambiosep()
    {
        if(User::find($_SESSION["USERHASH"])){
        $user = User::find($_SESSION["USERHASH"]);
    	if(isset($_POST['email'])){
            $model = new static();
            $oldpass=htmlentities(addslashes($_REQUEST['oldpass']));
            $npass=password_hash( $_REQUEST['newpass'], PASSWORD_DEFAULT, array("cost"=>12));
            $ladeahora = $user->password;
            if(password_verify($oldpass,$ladeahora)){

                $sql="UPDATE `usuario` SET `password`= :password  WHERE `usuario`.`id` = :id";

                $params = [ ":password" => $npass , ":id" => $user->id];

                session_destroy();
                header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."index");
                return DB::query($sql,$params);
            }else{header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=error de password");}
              
          }else{header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=no esta iniciada la seicion");}
     }else{header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=quizawea");}
    }
}
