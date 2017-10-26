<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=isset($title)?$title:"El Cuartel"; ?></title>
    <link rel="icon" type="image/x-icon" href="<?=PUBLIC_PATH?>img/favicon.ico"/>
    <link rel="stylesheet" href="<?=PUBLIC_PATH?>css/bootstrap.css">
    <link rel="stylesheet" href="<?=PUBLIC_PATH?>css/bootstrap-datetimepicker.css">
    <script src="<?=PUBLIC_PATH?>js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="<?=PUBLIC_PATH?>js/carro.js" type="text/javascript"></script>
    <script src="<?=PUBLIC_PATH?>js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="<?=PUBLIC_PATH?>/js/bootstrap.js" type="text/javascript"></script>
    <style>
      body{
        margin-bottom: 70px;
        background-position: top;
      }
    </style>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header">
          <a class="navbar-brand" href="">El Cuartel</a>
        </div>
        <ul class="nav navbar-nav">
          <li><a href="<?=PUBLIC_PATH?>index">Home</a></li>
          <li><a href="<?=PUBLIC_PATH?>carro">Carro</a></li>
          <li><a href="<?=PUBLIC_PATH?>ofertas">Ofertas</a></li>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categoria
            <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="<?=PUBLIC_PATH?>index/about">About</a></li>
              <li><a href="<?=PUBLIC_PATH?>index/show">Show</a></li>
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
          <li><a href="<?=PUBLIC_PATH?>singup"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
          <li><a href="<?=PUBLIC_PATH?>login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
        </ul>
      </div>
    </nav>
    <div class="container">