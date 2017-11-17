<?php

class ProfileController extends Controller
{
    public function actionIndex()
    {
        $user = User::find( $_SESSION["USERHASH"] );
        Response::render("menu",["title"=>"Usuario"]);
        //Response::json($user);
        Response::render("accessControl/perfil",["user" => $user]);
        Response::render("footer");
    }
    public function actionUser($id=0)
    {
        $user = User::find($id);
        Response::json(["message" => "hola $user->nombre"]);
    }
    public function actionAbout()
    {
        echo "hola desde about <br>\nId: Nombre: ";
    }
}