<?php

class AdminController extends Controller
{
    public function actionIndex()
    {
        
        if (!User::isAdmin($_SESSION["USERHASH"]))
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER.'login/');
        Response::render( "adminPanel/dashboard" );
    }
    public function actionUser($action="create")
    {
        $datos=false;
        if (!User::isAdmin($_SESSION["USERHASH"]))
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER.'login/');
        if ( $action == "modify") {
           $datos = User::findall();
        }
        Response::render( "adminPanel/dashboard", [ "contenido" => "adminPanel/User".ucfirst(strtolower($action)), "datos"=> $datos ] );
    }
    public function actionProduct($action="create")
    {
        $datos=false;
        if (!User::isAdmin($_SESSION["USERHASH"]))
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER.'login/');
        if ( $action == "modify") {
           $datos = Products::findall();
        }
        Response::render( "adminPanel/dashboard", [ "contenido" => "adminPanel/Product".ucfirst(strtolower($action)), "datos"=> $datos ] );
    }

    public function actionUserEdit($correo=null)
    {
        $datos = User::find($correo);
        $datos->button = "Editar";
        Response::render( "adminPanel/dashboard" );
        Response::render( "adminPanel/dashboard", [ "contenido" => "adminPanel/UserCreate", "datos"=> $datos ] );
    }
    public function actionUserDelete($id=0)
    {
        Response::render( "adminPanel/dashboard" );
    }
    public function actionProductEdit($id=null)
    {
        $datos = Products::find($id);
        $datos->button = "Editar";
        Response::render( "adminPanel/dashboard" );
        Response::render( "adminPanel/dashboard", [ "contenido" => "adminPanel/UserCreate", "datos"=> $datos ] );
    }
    public function actionProductDelete($id=0)
    {
        Response::render( "adminPanel/dashboard" );
    }
}
