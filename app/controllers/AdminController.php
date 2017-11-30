<?php

class AdminController extends Controller
{
    public function actionIndex()
    {
        
        if (User::isAdmin($_SESSION["USERHASH"]))
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER.'login/');
        Response::render( "adminPanel/dashboard" );
    }
    public function actionUser($action="view")
    {
        $datos=false;
        if (User::isAdmin($_SESSION["USERHASH"]))
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER.'login/');
        if ( $action == "modify") {
           $datos = User::findall();
        }
        Response::render( "adminPanel/dashboard", [ "contenido" => "adminPanel/User".ucfirst(strtolower($action)), "datos"=> $datos ] );
    }
    public function actionProduct($action="view")
    {
        $datos=false;
        if (User::isAdmin($_SESSION["USERHASH"]))
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER.'login/');
        if ( $action == "modify") {
           $datos = Product::findall();
        }
        Response::render( "adminPanel/dashboard", [ "contenido" => "adminPanel/Product".ucfirst(strtolower($action)), "datos"=> $datos ] );
    }
}
