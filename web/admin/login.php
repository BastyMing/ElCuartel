<?php 
require_once('./include/admin-load.php');
if(isset($_REQUEST['action'])){
	if($_REQUEST['action'] == 'logout'){
	$auth->logout();
	}
}
if(isset($_REQUEST['login'])){
		if(empty($_REQUEST['email']) || empty($_REQUEST['pwd'])){
			$error = 'Please enter Email and Password';
		}
		else{
		$email=trim($_REQUEST['email']);
		$password=trim($_REQUEST['pwd']);
	if(!$auth->login($email,$password)){

		$error = $auth->error;
	}
	}
}
if($auth->is_loggedin())
{
	header("location:index.php");	
}

if(!empty($auth->msg)){
	$success = $auth->msg;
	}
	if(!empty($auth->error)){
	$error = $auth->error;
	}
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>ElCuartel Admin Login</title>
<link href="css/style.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="js/jquery.js"></script>
<?php
  $bg = array('pattern-generator.png', 'background.png', 'elephant.jpg'); // array of filenames

  $i = rand(0, count($bg)-1); // generate random number size of the array
  $selectedBg = "$bg[$i]"; // set variable equal to which random filename was chosen
?>
<style type="text/css">
body{
	background:url(images/<?php echo $selectedBg; ?>);
	background-size:cover;
	color:#fff;
}
h1,h2{
	text-shadow:none;
}
a{
	color:#fff;
}
</style>
</head>
<body>
<div class="container">
<h1 class="text-center">El Cuartel Admin</h1>
<div class="col-md-3" style="margin:30px auto;float:none;padding:10px;">
<form action="login.php" method="post">
<div class="text-center"><img src="images/logo.png"></div>
<?php
if(isset($error)){
echo "<div class='alert alert-danger'>$error</div>";
}
if(isset($success)){
echo "<div class='alert alert-success'>$success</div>";
}
?>
 <div class="form-group">
<label for="email">Correo</label><input class="form-control"type="text" name="email" id="email" ></div> <div class="form-group">
<label for="pwd">Contraseña</label><input class="form-control"type="password" name="pwd" id="pwd" ></div> <div class="form-group">
<button id="submit" name="login" class="btn btn-primary">Login</button>
</div>
</form>
</div>
</div>




</body>
</html>