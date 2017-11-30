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
    public function actionCambios()
    {
        $user = User::find($_SESSION["USERHASH"]);
    	if(isset($_POST['email'])) {
          $data = (object) [
            "email"   => $_POST['email'],
            "oldpass"  => $_POST['oldpass'],
            "newpass"       => $_POST['newpass']
          ];
          $test = User::find($data->email);
          if ( !$test ) {
              $resultado = User::edit($data);
              if($resultado != "nonononono"){
                //session_destroy();
                header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=$resultado");
              }else{
                header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=correo o clave inocrrecta");
              }
          }else{header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=no esta iniciada la seicion");}
      }
    }
}
