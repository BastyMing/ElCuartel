<?php

class AccessControlController extends Controller
{
    public function actionIndex()
    {
        Response::render("menu",["title"=>"Login"]);

        Response::render("footer");
    }
    public function actionSingup()
    {
        if (isset($_SESSION["USERHASH"])){
            header("Location: http://".$_SERVER['SERVER_NAME'].PUBLIC_PATH);
        }
        Response::render("menu");
        Response::render("accessControl/register");
        Response::render("footer");
    }
    public function actionLogin()
    {
        if (isset($_SESSION["USERHASH"])){
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER);
        }
        Response::render("menu");
        Response::render("accessControl/login");
        Response::render("footer");
    }
    public function actionAuthenticate(){
        $correo   = $_REQUEST['email'];
        $password = $_REQUEST['pwd'];
        $user     = User::find( $correo );

        if ( $password == $user->password ) {
            $_SESSION["USERHASH"] = "$user->correo";
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."profile");
        }else{
            $_SESSION["USERHASH"] = false;
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."index");
        }
    }
    public function actionLogout(){
        session_destroy();
        header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER);
    }
    public function actionRegister()
    {
        if(isset($_POST['name'])) {
          $data = (object) [
            "nombres"   => $_POST['name'],
            "apellido"  => $_POST['apell'],
            "rut"       => $_POST['rut'],
            "birthdate" => $_POST['date'],
            "email"     => $_POST['email'],
            "password"  => $_POST['pwd'],
          ];
          $test = User::find($data->email);
          if ( !$test ) {
              $res = User::create( $data );
              unset( $data );
              if ( !$res )
              {
               echo '<script language="javascript">alert("accion realizada \n !!! SE HAN DETECTADO 39 VIRUS¡¡¡");</script>';
              }
          }
          else
          {
            echo '<script language="javascript">alert("Error!, accion NO realizada");</script>';
          }

        }
        header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."AccessControl/Login");
    }
}
