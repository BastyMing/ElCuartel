<?php
require("Carrito.class.php");
$carrito = new Carrito();
if (isset($_POST["action"])) {
    if ($_POST["action"] == "get") {
        //asignamos a $carro el método get_content() que contiene el contenido del carrito
        //$carrito->get_content();
        $carro = $carrito->get_content();
        if($carro)
        {
            foreach($carro as $producto)
            {
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
            }
        }else{
            echo "Empy";
        }
    }

    if ($_POST["action"] == "add") {
        //array que crea un producto
        $articulo = array(
                "id"            =>      14,
                "cantidad"      =>      3,
                "precio"        =>      50,
                "nombre"        =>      "camisetas"
            );

        //añadir el producto
        $carrito->add($articulo);
    }
    if ($_POST["action"] == "destroy") {
        $carrito->destroy();
    }
    if ($_POST["action"] == "total") {
        $carrito->precio_total();
    }
    if ($_POST["action"] == "remove") {
        $carro = $carrito->get_content();
        var_dump($carro);
        if (isset($carro[md5("14")])) {
            $carrito->remove_producto(md5("14"));   
        }else{
            echo "Product not found";
        }
    }
}