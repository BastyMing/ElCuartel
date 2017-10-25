  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href= <?php echo "$rootDir/?pagina=1" ?> >El Cuartel</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href=<?php echo "\"$rootDir\""; ?> >Home</a></li>
      <li><a href=<?php echo "\"$rootDir/php/carro\""; ?> >Carro</a></li>
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
    <ul class="nav navbar-nav navbar-right">}

      <?php echo '
      <li><a href="'.$rootDir."/php/login/register.php".'"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="'.$rootDir."/php/login/login.php".'"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>';
      ?>
    </ul>
  </div>
  </nav>