<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Carro</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <script src="../js/jquery-3.2.1.js" type="text/javascript" charset="utf-8"></script>
    <script src="carro.js" type="text/javascript" charset="utf-8"></script>
    <style>
        .producto{
            height: 30px;
            width: 100%;
            background-color: gray;
        }
    </style>
</head>
<body onload="getProducts()">
  <div class="container">
  <?php require("../menu.html") ?>
  <!-- ################################################################################# -->
    <?php
        $con = mysqli_connect("localhost", "root", "", "pdi");
        $sql = "SELECT * from local ";

        $consulta = mysqli_query($con,$sql);

        while ($registro = $consulta->fetch_object()){ 
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
  <?php include("../footer.html"); ?>
</body>
</html>