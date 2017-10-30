<?php
class ProductController extends Controller
{
    protected $carrito;
    protected $articulo = array(
                "id"            =>      null,
                "cantidad"      =>      null,
                "precio"        =>      null,
                "nombre"        =>      null
            );
    
    public function __construct() {
        global $carrito;
        $this->carrito =& $carrito;
    }
    public function actionIndex($id=1)
    {
        $product = Products::find($id);
        Response::render("menu");
        Response::render("products",["product" => $product]);
        Response::render("footer");
        unset($product);
    }
    public function actionComprar($id=0,$cantidad=0)
    {
        
        $product = Products::find($id);
        $precio = $product->precio;
        $nombre = $product->nombre;
        $this->articulo = array(
                "id"            =>      $id,
                "cantidad"      =>      $cantidad,
                "precio"        =>      $precio,
                "nombre"        =>      $nombre
            );
        $this->carrito->add( $this->articulo );
        unset($this->articulo);
    }
}