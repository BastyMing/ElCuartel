<!DOCTYPE html>
<?php require "php/config.php"; ?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title></title>

    <!-- Bootstrap -->
    <?php 
    echo '<link rel="stylesheet" href="'.$rootDir.'/css/bootstrap.css">
          <script src="'.$rootDir.'/js/jquery-3.2.1.js" type="text/javascript"></script>
          <script src="'.$rootDir.'/js/bootstrap.js"></script>
          <script src="'.$rootDir.'/js/carro.js" type="text/javascript"></script>';
    ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <div class="container">
  <?php include $menu; ?>
  <!-- ################################################################################# -->

  <?php
    $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1 ;
    DB::open();
    $consulta = DB::getProducts($pagina);
    $num_pages = DB::getTotalPages();
    DB::close();
    while ($registro = $consulta->fetch_object()){  
      $nombre = ucfirst(strtolower($registro->nombre));
      $precio = $registro->precio;
      $img = $registro->img ? $registro->img:"img/sorry-image-not-available.png";

      echo "<div class='col-md-3'>
              <div class='thumbnail'>
                <img src='$img' alt='...'>
                <div class='caption'>
                  <strong>$nombre</strong>
                  <p>$precio</p>
                </div>
              </div>
            </div>";
      }
    for ($i=1; $i<=$num_pages; $i++) {
      echo "<a href='?pagina=".$i."'>".$i."</a> | ";
    };
  ?>
  </div>
  <?php include $footer; ?>
</body>
</html>