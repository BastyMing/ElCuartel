<?php
  $ua = strtolower($_SERVER['HTTP_USER_AGENT']);
  if(stripos($ua,'android') !== false) {
    //por si acaso
    exit();
  }
?>
<!DOCTYPE html>
<?php require "php/config.php"; ?>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Bootstrap y titulo -->
    <?php 
    echo '<title>'.$titulo.'</title>
          <link rel="stylesheet" href="'.$rootDir.'/css/bootstrap.css">
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
    echo "<div class='col-md-12' id='pag'>
          <div class='text-center'><nav><ul class='pagination'><li class='disabled hidden-xs'><span><span aria-hidden='true'>P&aacute;gina $pagina de $num_pages</span></span></li>
          <li><a href='?pagina=1' aria-label='Next'>&laquo;<span class='hidden-xs'> Primera</span></a></li>";
    //los coloco con if pa no echarme nada
    $palforf = $pagina + 2;
    $palfori = $pagina - 2;
    if($palforf >= $num_pages){
      $palforf = $num_pages;
    }
    if($palforf == 0){
      $palfori = $palfori - 2;
    }
    if($palfori > $num_pages){
      $palfori = $num_pages - 2;
    }
    if($palfori == $num_pages){
      $palfori = $num_pages - 2;
    }
    if($palfori < 1){
      $palfori = 1;
    }
    for($i=$palfori; $i<$pagina; $i++){
      echo "<li><a href='?pagina=".$i."'>".$i."</a></li>"; 
    }
    echo "<li class='active'><span> $pagina <span class='sr-only'>(current)</span></span></li>";
    for ($i=$pagina+1; $i<=$palforf; $i++) {//$num_pages
      echo "<li><a href='?pagina=".$i."'>".$i."</a></li>";
    };
    //echo "<li><a href='?pagina=".$pagina+1."' aria-label='Next'><span class='hidden-xs'>Siguiente </span>&rsaquo;</a></li>"; //por si acaso XD
    echo "<li><a href='?pagina=".$num_pages."' aria-label='Last'><span class='hidden-xs'>&Uacute;ltima </span>&raquo;</a></li></ul></nav></div>";
  ?>
  </div>
  <?php include $footer; ?>
</body>
</html>