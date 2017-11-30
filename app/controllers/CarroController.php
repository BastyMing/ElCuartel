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
        Response::render("carro/carro",["carro" => $carro, "total" => $this->carrito->precio_total()]);
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
            $carro = $this->carrito->get_content();
            Response::render("carro/carro",["carro" => $carro, "total" => $this->carrito->precio_total()]);
        }else{
            echo "Product not found";
        }
    }
    public function actionBoleta(){
        if (!isset($_SESSION["USERHASH"])) {
            header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."accessControl/login");
        }
        $user = User::find( $_SESSION["USERHASH"] );
        $carro = $this->carrito->get_content();
        Response::render("carro/boleta",["carro" => $carro, "total" => $this->carrito->precio_total(), "user"=> $user]);
    }
}

/*

echo $producto["id"];
echo "<br />";
echo $producto["unique_id"];
echo "<br />";
echo $producto["cantidad"];
echo "<br />";
echo $producto["precio"];
echo "<br />";
echo $producto["nombre"];
echo "<br />";
echo $carrito->precio_total();
echo "<br />";

*/