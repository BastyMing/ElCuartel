<!DOCTYPE html>
<?php require "../config.php"; ?>
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
  <div class="col-md-7  col-sm-1" ></div>
  <div class="col-md-3 col-sm-11">
  	<form method="POST" action="login.php">
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="pwd" required>
      </div>
      <button type="submit" class="btn btn-default" name="ing" id="ing">ingresar</button>
      <button type="submit" class="btn btn-default" name="reg" id="reg">Registrar</button>
    </form>
    <?php
    if(isset($_REQUEST["ing"])) {
      $email=$_POST['email'];
      $pass=$_POST['pwd'];
      $con = mysqli_connect("localhost", "root", "", "pdi");
      $sql = "SELECT * FROM `usuario` WHERE correo='".$email."' and password='".$pass."'";

      $consulta = mysqli_query($con, $sql);
      $nfilas = mysqli_num_rows($consulta);
      if($nfilas>0){
        header("location: index.php");
      }
    }
    if(isset($_REQUEST["reg"])) {
      header("location: register.php");
    }
    ?>
  </div>
  
  <?php include $footer; ?>
</div>

</body>
</html>