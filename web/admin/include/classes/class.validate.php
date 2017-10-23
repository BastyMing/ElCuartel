<?php 

class Validate{
	var $error = '';
	public function email($email){
		$email = trim($email);
		if(strstr($email,'@') && strstr($email,'.')){
			$email = explode('@',$email);
			
			if(count($email)  == 2) { return true;}
			$this->error = 'Correo no es valido';
			return false;
	}
	$this->error = 'Correo no es valido';
			return false;
	}
public function password($passowrd){
	$passowrd = trim($passowrd);
	if(strlen($passowrd) >= 10 || strlen($passowrd) <= 4 )
		$this->error = 'Contraseña debe ser entre 5-10 de largo';
		return false;
	}
public function role($role){
	if($role == 1 || $role == 2){ return true;}
	$this->error = 'Rol Invalido';
	return false;
	}


}
?>