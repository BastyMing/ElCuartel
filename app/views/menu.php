<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=isset($title)?$title:"El Cuartel"; ?></title>
    <link rel="icon" type="image/x-icon" href="<?=PUBLIC_PATH?>img/favicon.ico"/>
    <link rel="stylesheet" href="<?=PUBLIC_PATH?>css/bootstrap.css">
    <link rel="stylesheet" href="<?=PUBLIC_PATH?>css/bootstrap-datetimepicker.css">
    <script src="<?=PUBLIC_PATH?>js/jquery-3.2.1.js" type="text/javascript"></script>
    <script src="<?=PUBLIC_PATH?>js/carro.js" type="text/javascript"></script>
    <script src="<?=PUBLIC_PATH?>js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="<?=PUBLIC_PATH?>js/bootstrap.js" type="text/javascript"></script>
    <script>
      var PUBLIC_PATH = "<?=PUBLIC_PATH?>";
    </script>
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
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                        
          </button>
          <a class="navbar-brand" href="">El Cuartel</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="<?=PUBLIC_PATH?>index">Home</a></li>
            <li><a href="<?=PUBLIC_PATH?>carro">Carro</a></li>
            <li><a href="<?=PUBLIC_PATH?>ofertas">Ofertas</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categoria<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=PUBLIC_PATH?>index/about">About</a></li>
                <li><a href="<?=PUBLIC_PATH?>index/show">Show</a></li>
                <li><a href="#">Page 1-3</a></li>
              </ul>
            </li>
          </ul>

          <form class="navbar-form navbar-left" method="POST" action="<?=PUBLIC_PATH?>index/buscar">
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
            <li><a href="<?=PUBLIC_PATH?>login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">