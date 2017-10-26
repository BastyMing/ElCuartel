<?php
class ProductController extends Controller
{
    public function actionIndex($id=1)
    {
        $product = Products::find($id);
        Response::render("menu");
        Response::render("products",["product" => $product]);
        Response::render("footer");
    }
    public function actionComprar($id=2,$cantidad=3)
    {
        echo $id;
        echo $cantidad;
    }
}