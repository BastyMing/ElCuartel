<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
<title></title>

    <!-- Bootstrap -->
<link href="css/bootstrap.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <div class="container">
  <?php require("menu.php") ?>
  <!-- ################################################################################# -->

  <?php
    $con = mysqli_connect("localhost", "root", "", "pdi");
    $sql = "SELECT * from local ";

    $consulta = mysqli_query($con, $sql);
    $nfilas = mysqli_num_rows($consulta);
    while ($registro = mysqli_fetch_array($consulta)){  
      $nombre = $registro["nombre"];
      $precio = $registro["precio"];
      $img = $registro["img"];

        echo "<div class='col-md-4'>
        <div class='thumbnail'>
      <img src='$img' alt='...'>
      <div class='caption'>
        <h3>$nombre</h3>
        <p>$precio</p>
      </div>
      </div>
      </div>";
      }
      if(isset($_REQUEST["buscar"])) {
         $sql = "SELECT * from local ";

        $consulta = mysql_query($sql, $con);
        $nfilas = mysql_num_rows($consulta);
        while ($registro = mysql_fetch_array($consulta)){  
          $nombre = $registro["nombre"];
          $precio = $registro["precio"];
          $img = $registro["img"];

          echo "<div class='col-md-4'>
          <div class='thumbnail'>
          <img src='$img' alt='...'>
          <div class='caption'>
          <h3>$nombre</h3>
          <p>$precio</p>
          <p>
          </p>
          </div>
          </div>
          </div>";
      }
      }

  ?>
  </div>
  <?php include("footer.html"); ?>
</body>
</html>