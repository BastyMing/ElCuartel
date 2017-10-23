<?php 
class Auth{
	var $error = '';
	var $key = 'ADMIN';
	public $sdb;
	
	public function __construct(){
	global $db;
	 $this->sdb = $db;
	}
	
	public function is_loggedin(){
		
		if(isset($_SESSION['adminauth']) && isset($_SESSION['curr_user']) && isset($_SESSION['token'])){
		$checksum = md5($_SESSION['curr_user'] . 'ADMIN' . date('ymd'));
			if($checksum == $_SESSION['token']){
			return true;
			}
			return false;
		}
		return false;	
	}
public function is_admin(){
		if($this->is_loggedin()){
			if($_SESSION['role'] == '1'){
				return true;
			}
		return false;	
		}
		return false;
}
public function login($email,$password){
	global $encryption;
	$password = $encryption->encrypt($password);
	$email = strtolower($email);
	$stmt = "SELECT * FROM  " . PFX . "users WHERE active = 1 AND email = :email AND password = :pass";
	
	$this->sdb->query($stmt);
	$this->sdb->bind(":email",$email);
	$this->sdb->bind(":pass",$password);
	$result = $this->sdb->single();
	
	if($result){
		$_SESSION['curr_user'] = $result['email'];
		$_SESSION['role'] =	$result['role'];
		$_SESSION['token'] = md5($result['email'] . 'ADMIN' . date('ymd'));
		$_SESSION['adminauth'] = true;
		
		$stmt = "UPDATE " . PFX . "users  SET `last_login` = '" . $result['latest_login'] . "' WHERE id =:id";
		$stmtn = "UPDATE " . PFX . "users  SET `latest_login` = '" . date('d M Y') . "' WHERE id =:id";
		$this->sdb->query($stmt);
		$this->sdb->bind(":id",$id);
		$this->sdb->execute();
		$this->sdb->query($stmtn);
		$this->sdb->bind(":id",$id);
		$this->sdb->execute();
		
		
		return true;
	}
	$this->error = 'Invalid Username / Password';
	return false;
}
public function logout(){
	session_destroy();
	session_name('ADMIN');
	header("location:login.php");
	exit;
}	
}

?>