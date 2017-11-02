<?php

class IndexController extends Controller
{
    public function actionIndex($npage=1)
    {
        $npage = is_numeric($npage) ? $npage : 1;
        
        $cpages = Products::coutPages();
        $products = Products::findlimit($npage);
        Response::render("menu");
        Response::render("products/products",["products" => $products]);
        Response::render("products/paginado",["page"=>$npage, "cpages"=>$cpages]);
        Response::render("footer");
    }
    public function actionAbout($id="default")
    {
        Response::render("menu");
        echo "<h1>HOLA</h1>";
        Response::render("footer");
    }

    public function actionBuscar($params="ron"){
        $resultados = Products::buscar($params);
        Response::render("menu");
        Response::render("busqueda", ["resultados" => $resultados]);
        Response::render("footer");
    }

    public function actionShow($pagina=1)
    {
        Response::render("menu");
        Response::render("modal");
    }
}