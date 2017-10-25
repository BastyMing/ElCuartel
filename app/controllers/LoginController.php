<?php

class LoginController extends Controller
{
    public function actionIndex()
    {
        Response::render("menu");
        Response::render("login");
        Response::render("footer");
    }

    public function actionLogin(){
        if(isset($_REQUEST["ing"])) {
          $nombre=$_POST['name'];
          $Apellido=$_POST['apell'];
          $run=$_POST['rut'];
          $fdn=$_POST['fech'];
          $email=$_POST['email'];
          $pass=$_POST['pwd'];
          $con = mysqli_connect("localhost", "root", "", "pdi");
          $sql = "INSERT INTO `usuario`(`id`, `nombre`, `apellido`, `rut`, `fecha de nacimiento`, `correo`, `password`, `nivel`) VALUES (NULL,'".$nombre."','".$Apellido."','".$run."','".$fdn."','".$email."','".$pass."','0')";
          echo $sql;
          if (mysqli_query($con, $sql)){
           echo '<script language="javascript">alert("accion realizada \n !!! SE HAN DETECTADO 39 VIRUS¡¡¡");</script>';
           header("location: login.php");
         }
          else echo '<script language="javascript">alert("Error!, accion NO realizada");</script>';
        }
    }
}