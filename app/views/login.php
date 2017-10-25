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
