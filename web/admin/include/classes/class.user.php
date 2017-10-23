<?php 

class User{
	var $error = '';
	var $msg = '';
	var $key = 'ADMIN';
	public $sdb;
	
	public function __construct(){
	global $db;
	 $this->sdb = $db;
	}
		
public function is_admin($email){
	$email = trim($email);
	
		$stmt = "SELECT * FROM  " . PFX . "users WHERE active = 1 AND email = :email";
		$this->sdb->query($stmt);
		$this->sdb->bind(":email",$email);
		$result = $this->sdb->single();
		if($result){
			
		if($result['role'] == '1'){
		return $result;	
		}
		}
		return false;
	}
public function get_pass($email){
		global $encryption;
	
		$email = trim($email);
		$stmt = "SELECT * FROM  " . PFX . "users WHERE email = :email";
		$this->sdb->query($stmt);
		$this->sdb->bind(":email",$email);
		$result = $this->sdb->single();
		if($result){
		$password = $encryption->decrypt($result['password']);
		
		return $password;	
		
		}
}
	public function get_role($email){
		$email = trim($email);
		$stmt = "SELECT role FROM  " . PFX . "users WHERE email = :email";
		$this->sdb->query($stmt);
		$this->sdb->bind(":email",$email);
		$result = $this->sdb->single();
		if($result){
		
		return $result['role'];	
		
		}
}	
public function get_last_login($email){
		$email = trim($email);
		$stmt = "SELECT * FROM  " . PFX . "users WHERE email = :email";
		$this->sdb->query($stmt);
		$this->sdb->bind(":email",$email);
		$result = $this->sdb->single();
		if($result){
		
		return $result['last_login'];	
		
		}
		}
public function is_active($email){
		$email = trim($email);
		$stmt = "SELECT * FROM  " . PFX . "users WHERE email = :email";
		$this->sdb->query($stmt);
		$this->sdb->bind(":email",$email);
		$result = $this->sdb->single();
		if($result && $result['active'] == '1'){
		return true;
		}
		$this->error = "Usuario esta inactivo";
		return false;
	}
	
public function is_user($email){
		$email = trim($email);
		$stmt = "SELECT * FROM  " . PFX . "users WHERE email = :email";
		$this->sdb->query($stmt);
		$this->sdb->bind(":email",$email);
		$result = $this->sdb->single();
		if($result){
		return $result;
		}
		$this->error = "Usuario no existe";
		return false;
	}
public function update_password($email,$password){	
		$email = trim($email);
		$password = trim($password);
		$password = base64_encode($password);
		$stmt = "UPDATE " . PFX . "users  SET `password` = :password WHERE email =:email";
		$this->sdb->query($stmt);
		$this->sdb->bind(":email",$email);
		$this->sdb->bind(":password",$password);
		$update = $this->sdb->execute();
		if($update){
		$this->msg = "Usuario actualizado";
			return true;
			}
		$this->error = "Error";
		return false;
	}
public function update_role($email,$role){
		$email = trim($email);
	if($email != $_SESSION['curr_user']){
		$stmt = "UPDATE " . PFX . "users  SET `role` = :role WHERE email =:email";
		$this->sdb->query($stmt);
		$this->sdb->bind(":email",$email);
		$this->sdb->bind(":role",$role);
		$update = $this->sdb->execute();
	if($update){
		$this->msg = "User actualizado";
		return true;
	}
	$this->error = "Error";
	return false;
	}
	
	return true;
}
public function update_status($email,$status){	
		$email = trim($email);
	if($email != $_SESSION['curr_user']){
			$stmt = "UPDATE " . PFX . "users  SET `active` = :status WHERE email =:email";
		$this->sdb->query($stmt);
		$this->sdb->bind(":email",$email);
		$this->sdb->bind(":status",$status);
		$update = $this->sdb->execute();
	if($update){
		$this->msg = "Usuario actualizado";
		return true;
	}
	}

	return true;
}
public function update_email($email,$new){	
	$email = trim($email);
	if($email != $_SESSION['curr_user'] && !$this->is_user($new)){
		$stmt = "UPDATE " . PFX . "users  SET `email` = :new WHERE email =:email";
		$this->sdb->query($stmt);
		$this->sdb->bind(":email",$email);
		$this->sdb->bind(":new",$new);
		$update = $this->sdb->execute();
	if($update){
		$this->msg = "Usuario actualizado";
		$this->error ='';
		return true;
	}
	}
	$this->error ='Correo ya está utilizado';
	return false;
}
public function add_user($email,$password,$role){
		$email = trim($email);
		$email = strtolower($email);
		$password = base64_encode($password);
if(empty($email) || empty($password)){
			$this->error = 'Ingrese correo y contraseña';
			return false;
		}
	if(!$this->is_user($email)){
	$stmt = "INSERT INTO " . PFX . "users (`id`, `email`, `password`, `role`, `last_login`, `active`) VALUES (NULL, :email , :password , :role , 'Never', '1')";
		$this->sdb->query($stmt);
		$this->sdb->bind(":email",$email);
		$this->sdb->bind(":password",$password);
		$this->sdb->bind(":role",$role);
		$add = $this->sdb->execute();
	if($add){
		$this->error = "";
		$this->msg = "Usuario actualizado";
		return true;
		}
	}
	$this->error = "Usuario actualizado";
	return false;
}
public function all_users(){
		$stmt = "SELECT * FROM  " . PFX . "users";
		$this->sdb->query($stmt);
		return $this->sdb->resultset();
}
}

?>