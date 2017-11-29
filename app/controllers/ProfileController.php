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
    public function cambios()
    {
    	$params = $_POST["update"];
    	$resultados = User::edit($params);
    	//header 
    }
}
