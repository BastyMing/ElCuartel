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
  <div class="row">
    <div class="container">
    <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">El Cuartel</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <li><a href="login.php">Ofertas</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categoria
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">Page 1-1</a></li>
          <li><a href="#">Page 1-2</a></li>
          <li><a href="#">Page 1-3</a></li>
        </ul>
      </li>
    </ul>

    <form class="navbar-form navbar-left" method="POST" action="index.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search">
        <div class="input-group-btn" name="busca">
          <button class="btn btn-default" type="submit" name="buscar">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="register.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
  </div>
  </nav>
</div>
  <!-- ################################################################################# -->
  <div class="col-md-7  col-sm-1" ></div>
  <div class="col-md-3 col-sm-11">
  	<form method="POST" action="login.php">
      <div class="form-group">
        <label for="email">Email address:</label>
        <input type="email" class="form-control" id="email" name="email">
      </div>
      <div class="form-group">
        <label for="pwd">Password:</label>
        <input type="password" class="form-control" id="pwd" name="pwd">
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
        header("location: ../php/index.php");
      }
    }
    if(isset($_REQUEST["reg"])) {
      header("location: register.php");
    }
    ?>
  </div>
  <div class="col-md-1"/>
</div>



  



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>