<?php

$carrito = new Carrito();
if (isset($_POST["action"])) {
    if ($_POST["action"] == "get") {
        //asignamos a $carro el método get_content() que contiene el contenido del carrito
        //$carrito->get_content();
        $carro = $carrito->get_content();
        if($carro)
        {
            $i = 0;
            $len = count($carro);
            foreach($carro as $producto)
            {
                ?>
                <div class='col-md-12'>
                    <div class='col-md-6 text-success'>
                        <?php echo $producto["nombre"]; ?>
                    </div>
                    <div class='col-md-3'>
                        <?php echo $producto["cantidad"]; ?>
                    </div>
                    <div class='col-md-3'>
                        <?php echo $producto["cantidad"]*$producto["precio"]; ?>
                    </div>
                    <?php
                         if ($producto === end($carro)){
                            echo "<div class='col-md-12 text-right'>";
                                echo $carrito->precio_total();
                            echo '</div>';
                        }
                    ?>
                </div>
            <?php
            }
        }else{
            echo "Empty";
        }
    }

    if ($_POST["action"] == "add") {
        $id = $_POST["id"];
        $cantidad = $_POST["cantidad"];
        $producto = getData($id);

        $precio = $producto->precio;
        $nombre = $producto->nombre;
        //array que crea un producto
        $articulo = array(
                "id"            =>      $id,
                "cantidad"      =>      $cantidad,
                "precio"        =>      $precio,
                "nombre"        =>      $nombre
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

function getData($id){
    DB::open();
    $sql = "SELECT * from local WHERE codigo=$id";
    DB::runQRY($sql);
    $consulta = DB::runQRY($sql) or die("No se encontro");
    $registro = $consulta->fetch_object();
    DB::close();
    return $registro;
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