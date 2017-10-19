<!DOCTYPE html>
<?php require "../config.php";
require $serverRoot."/php/carro/Carrito.class.php"; ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Carro</title>
    <?php 
    echo '<link rel="stylesheet" href="'.$rootDir.'/css/bootstrap.css">
          <link rel="stylesheet" href="'.$rootDir.'/css/carro.css">
          <script src="'.$rootDir.'/js/jquery-3.2.1.js" type="text/javascript"></script>
          <script src="'.$rootDir.'/js/bootstrap.js"></script>
          <script src="'.$rootDir.'/js/carro.js" type="text/javascript"></script>';
    ?>
    <style>
        .table-items td {
            padding: 8px 0 !important;
            vertical-align: middle !important;
            font-size: 1.3em;
        }
    </style>
</head>
<body>
  <div class="container">
    <?php include $menu; ?>
  <!-- ################################################################################# -->
<?php

$carrito = new Carrito();
$carro = $carrito->get_content();
if ($carro) { ?>
        
        
    <table class="table table-items text-success bg-warning">
        <thead class="bg-primary">
            <tr>
                <th colspan="2">Artículo</th>
                <th><div class="align-center">Cantidad</div></th>
                <th><div class="align-right">Precio</div></th>
            </tr>
        </thead>
        <tbody>


<?php
foreach($carro as $producto){ ?>

    <tr>
        <td>
            <img src="/lenguajedemarcado/ElCuartel/img/sorry-image-not-available.png" alt="Image" width="100" height="100">
        </td>
        <td><?php echo $producto["nombre"]; ?>
            <a title="Remove Item" class="icon-remove-sign" href="#"></a>
        </td>
        <td>
            <input type="text" disabled class="tiny-size" value="<?php echo $producto["cantidad"]; ?>" >
        </td>
        <td>
            <?php echo "$".$producto["precio"]; ?>
        </td>
    </tr>

    <?php
    if ($producto === end($carro)){ ?>

        <tr>
            <td colspan="2" rowspan="2"></td>
            <td class="bg-danger">Envío:</td>
            <td class="bg-danger"><div class="align-right">$????</div></td>
        </tr>
        <tr class="bg-danger">
            <td>Subtotal:</td>
            <td>
                <div class="size-16 align-right"><?php echo "$".$carrito->precio_total(); ?></div>
            </td>
        </tr>
    </tbody>
</table>

    <?php
    }
}
}else{
    echo "Empy";
}
?>



  </div>
<?php include $footer; ?>
</body>
</html>