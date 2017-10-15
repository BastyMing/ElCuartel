<!DOCTYPE html>
<?php require "../config.php";
      require $serverRoot.'/php/conexion.php'; ?>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Carro</title>
    <?php 
    echo '<link rel="stylesheet" href="'.$rootDir.'/css/bootstrap.css">
          <script src="'.$rootDir.'/js/jquery-3.2.1.js" type="text/javascript"></script>
          <script src="'.$rootDir.'/js/bootstrap.js"></script>
          <script src="'.$rootDir.'/js/carro.js" type="text/javascript"></script>';
    ?>
    
</head>
<body onload="getProducts()">
  <div class="container">
    <?php include $menu; ?>
  <!-- ################################################################################# -->
    <?php
        DB::open();
        $sql = "SELECT * from local ";
        $consulta =  DB::runQRY($sql);
        DB::close();
        $limite = 2;
        for ($i=0; $i <$limite ; $i++) {
          $registro = $consulta->fetch_object();
          $id = $registro->codigo;
          $nombre = $registro->nombre;
          $precio = $registro->precio;
          $img = $registro->img;

          echo "<div class='col-md-4'>
                    <div class='thumbnail'>
                        <img src='$img' alt='...'>
                        <form action='' method='POST' onsubmit='return addProduct($( this ).serialize())'>
                            <div class='caption'>
                                <h3>$nombre</h3>
                                <p>$precio</p>
                                <p>
                                    <input hidden name='id' value='$id'>
                                    <input type='number' name='cantidad' step='1' required>
                                    <input class='btn btn-primary' type='submit' name='boton' value='Comprar'>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>";
          }
  ?>
  <div class='col-md-4'>
        <div class="producto">
            <input type="button" onclick="getProducts()" value="Ver">
            <input type="button" onclick="destroyCarro()" value="Destroy">
        </div>
    <div id="resultado" class='col-md-12 bg-danger'>
        
    </div>

  </div>

    </div>
  <?php include $footer; ?>
</body>
</html>