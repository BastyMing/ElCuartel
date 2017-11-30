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

            return DB::query($sql, $params);
            }else{header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=no esta iniciada la seicion");}
        }
    }

    public function actionCambios()
    {
        $user = User::find($_SESSION["USERHASH"]);
    	if(isset($_POST['email'])) {
          $data = (object) [
            "email"   => $_REQUEST['email'],
            "oldpass"  => $_REQUEST['oldpass'],
            "newpass"       => $_REQUEST['newpass']
          ];
          $test = User::find($user->email);
          echo "texto";exit();
          if ( !$test ) {
              $resultado = User::edit($data->email,$data->oldpass,$data->newpass);
              if($resultado != "nonononono"){
                //session_destroy();
                header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=");
              }else{
                header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=correo o clave inocrrecta");
              }
          }else{header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=no esta iniciada la seicion");}
      }
    }
}
