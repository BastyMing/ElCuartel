<?php

class CarroController extends Controller
{
    public function __construct() {
        global $carrito;
        $this->carrito =& $carrito;
    }
    public function actionIndex()
    {
        $carro = $this->carrito->get_content();
        Response::render("menu",["title"=>"Carro"]);
        Response::render("carro",["carro" => $carro, "total" => $this->carrito->precio_total()]);
        Response::render("footer");
    }
    public function actionGetProducts(){
        $carro = $this->carrito->get_content();
        var_dump($carro);
    }
    public function actionDestroyCarro(){
        $this->carrito->destroy();
    }
    public function actionRemoveItem($id=0)
    {
        $carro = $this->carrito->get_content();
        if (isset($carro[md5($id)])) {
            $this->carrito->remove_producto(md5($id));   
        }else{
            echo "Product not found";
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
}