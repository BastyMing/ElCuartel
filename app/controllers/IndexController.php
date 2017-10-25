<?php

class IndexController extends Controller
{
    public function actionIndex($npage=1)
    {
        $npage = is_numeric($npage) ? $npage : 1;
        
        $cpages = Products::coutPages();
        $products = Products::findlimit($npage,4);
        Response::render("menu");
        Response::render("products",["products" => $products]);
        Response::render("paginado",["page"=>$npage, "cpages"=>$cpages]);
        Response::render("footer");
    }
    public function actionAbout($id="default")
    {
        Response::render("menu");
        echo "<h1>HOLA</h1>";
        Response::render("footer");
    }
    public function actionProduct($id=1)
    {
        $product = Products::find($id);
        Response::render("menu");
        Response::render("products",["product" => $product]);
        Response::render("footer");
    }

    public function actionShow($pagina=1)
    {
        $cpages = Products::coutPages();
        $products = Products::findlimit($pagina,4);
        Response::render("menu");
        Response::render("products",["products" => $products]);
        Response::render("paginado",["pagina"=>$pagina, "cpages"=>$cpages]);
        Response::render("footer");
    }
}