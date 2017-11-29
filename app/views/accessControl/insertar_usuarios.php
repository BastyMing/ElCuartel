<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>

<?php

	$usuario= $_POST["name"];
	$apellido = $_POST["apell"];
	$rut = $_POST["rut"];
	$fecha = $_POST["date"];
	$email = $_POST["email"];
	$contrasenia= $_POST["pwd"];
	
	$pass=password_hash($contrasenia, PASSWORD_DEFAULT, array("cost"=>12));
				
	try{

		$base=new PDO('mysql:host=localhost; dbname=pdi', 'root', '');
		
		$base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		$base->exec("SET CHARACTER SET utf8");		
		
		
		$sql="INSERT INTO usuario (nombre, apellido, rut, fecha_de_nacimiento, correo, password) VALUES (:usu, :ape, :rut, :fecha, :email , :contra)";
		
		$resultado=$base->prepare($sql);		
		
		
		$resultado->execute(array(":usu"=>$usuario, ":ape"=>$apellido, ":rut"=>$rut, ":fecha"=>$fecha, ":email"=>$email, ":contra"=>$pass));		
		
		
		echo "Registro insertado";
		header("Location: http://".$_SERVER['SERVER_NAME'].SUB_FOLDER."AccessControl/Login");
		
		$resultado->closeCursor();

	}catch(Exception $e){			
		
		
		echo "Línea del error: " . $e->getLine();
		
	}finally{
		
		$base=null;
		
		
	}

?>
</body>
</html>