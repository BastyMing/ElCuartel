<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=isset($title)?$title:"El Cuartel"; ?></title>
    <link rel="icon" type="image/x-icon" href="<?=PUBLIC_PATH?>img/favicon.ico"/>

    <script src="<?=PUBLIC_PATH?>js/jquery-2.1.4.min.js" type="text/javascript"></script>
    <script src="<?=PUBLIC_PATH?>js/moment-with-locales.js" type="text/javascript"></script>
    <link rel="stylesheet" href="<?=PUBLIC_PATH?>css/bootstrap.css">
    <link rel="stylesheet" href="<?=PUBLIC_PATH?>css/bootstrap-datetimepicker.css">
    <script src="<?=PUBLIC_PATH?>js/bootstrap.js" type="text/javascript"></script>
    <script src="<?=PUBLIC_PATH?>js/bootstrap-datetimepicker.js" type="text/javascript"></script>
    <script src="<?=PUBLIC_PATH?>js/bootstrap-dialog.min.js" type="text/javascript"></script>

    
    
    <script src="<?=PUBLIC_PATH?>js/carro.js" type="text/javascript"></script>


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
            <li><a href="<?=SUB_FOLDER?>index">Home</a></li>
            <li><a href="<?=SUB_FOLDER?>carro">
              <span class="glyphicon glyphicon-shopping-cart"></span> Carro</a>
            </li>
            <li><a href="<?=SUB_FOLDER?>ofertas">Ofertas</a></li>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#">Categoria<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=SUB_FOLDER?>index/about">About</a></li>
                <li><a href="<?=SUB_FOLDER?>index/show">Show</a></li>
                <li><a href="#">Page 1-3</a></li>
              </ul>
            </li>
          </ul>

          <form class="navbar-form navbar-left" method="POST" action="<?=SUB_FOLDER?>index/buscar">
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
            <?php if (isset($_SESSION["USERHASH"])) { ?>
            
            <li><a href="<?=SUB_FOLDER?>profile"><span class="glyphicon glyphicon-user"></span> Perfil </a></li>
            <li><a href="<?=SUB_FOLDER?>AccessControl/Logout"><span class="glyphicon glyphicon-log-out"></span> Desconectar </a></li>

            <?php }else{ ?>
            
            <li><a href="<?=SUB_FOLDER?>AccessControl/Singup"><span class="glyphicon glyphicon-user"></span> Registrarse</a></li>
            <li><a href="<?=SUB_FOLDER?>AccessControl/Login"><span class="glyphicon glyphicon-log-in"></span> Ingresar</a></li>

            <?php } ?>
          </ul>
        </div>
      </div>
    </nav>
    <div class="container">