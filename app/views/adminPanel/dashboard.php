<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=.83">
    <title><?=isset($title)?$title:"AdminPanel"; ?></title>
    <link rel="icon" type="image/x-icon" href="<?=PUBLIC_PATH?>img/favicon.ico"/>
    <?php Response::render( "adminPanel/assets" ); ?>
    <script>
      var PUBLIC_PATH = "<?=PUBLIC_PATH?>";
    </script>
  </head>
  <body>
  <nav class="navbar navbar-default sidebar" role="navigation">
    <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-sidebar-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>      
    </div>
    <div class="collapse navbar-collapse" id="bs-sidebar-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?=SUB_FOLDER?>admin/">DashBoard<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li class="active"><a href="<?=SUB_FOLDER?>">WebPage<span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-home"></span></a></li>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-user"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="<?=SUB_FOLDER?>admin/user/create/">Crear</a></li>
            <li><a href="<?=SUB_FOLDER?>admin/user/modify/">Modificar</a></li>
          </ul>
        </li>          
        <li >
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Productos <span class="caret"></span><span style="font-size:16px;" class="pull-right hidden-xs showopacity glyphicon glyphicon-th-list"></span></a>
          <ul class="dropdown-menu forAnimate" role="menu">
            <li><a href="<?=SUB_FOLDER?>admin/product/create/">Crear</a></li>
            <li><a href="<?=SUB_FOLDER?>admin/product/modify/">Modificar</a></li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
</nav>

    <!-- Main Content -->
    <div class="container-fluid" style="margin-left: 200px;">
        <div class="side-body">
          <?php if (!empty($contenido)) Response::render( $contenido, [ "datos" => $datos ] ); ?>
        </div>
    </div>