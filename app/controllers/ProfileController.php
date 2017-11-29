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
    	if(isset($_POST['correo'])) {
          $data = (object) [
            "email"   => $_POST['email'],
            "oldpass"  => $_POST['oldpass'],
            "newpass"       => $_POST['newpass']
          ];
          $resultado = User::edit($data);
          if($resultado != "nonononono"){
            session_destroy();
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."index");
          }else{
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile?msj=1");
          }
      }
    }
}
