<?php

class CarroController extends Controller
{
    public function actionIndex()
    {
        Response::render("menu");
        Response::render("carro");
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