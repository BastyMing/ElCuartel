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
        if (User::isAdmin($_SESSION["USERHASH"]))
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER.'login/');
        if ( $action == "modify") {
           $products = Products::findall();
        }
        Response::render( "adminPanel/dashboard", [ "contenido" => "adminPanel/User".ucfirst(strtolower($action)) ] );
        echo $action;
    }
}
