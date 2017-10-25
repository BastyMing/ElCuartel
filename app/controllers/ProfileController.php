<?php

class ProfileController extends Controller
{
    public function actionIndex()
    {
        $user = User::find(1);
        Response::json($user);
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