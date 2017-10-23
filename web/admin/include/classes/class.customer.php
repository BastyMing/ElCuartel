<?php 
class Customer{
	var $error = '';
	var $msg = '';
	var $key = 'SYMBIOTIC';
	public $sdb;
	
	public function __construct(){
	global $db;
	 $this->sdb = $db;
	}
 
public function all(){
global $crypt;
	$stmt = "SELECT * FROM  " . PFX . "customers";
	$this->sdb->query($stmt);
	$customers = $this->sdb->resultset();
	if($customers){
	for($i = 0; $i < count($customers); ++$i){
	$cid = $customers[$i]['id'];
	$customers[$i]['id'] =  $crypt->encrypt($cid);
	}
	return $customers ;
	}
	return false;
}
public function is_customer($id){
	global $crypt;
	$id = $crypt->decrypt($id);
	$stmt = "SELECT * FROM  " . PFX . "customers WHERE id = :id";
	$this->sdb->query($stmt);
	$this->sdb->bind(':id',$id);
	$customer = $this->sdb->single();
	if($customer){
		$cid = $customer['id'];
		$customer['id'] =  $crypt->encrypt($cid);
		return $customer ;
		}
	$this->error = "No existen Compradores";
	return false;
	}
	public function details($id){
		$details = $this->is_customer($id);
		return $details;
	}

	public function address($id){
	global $crypt;
		if($this->is_customer($id)){
			$id = $crypt->decrypt($id);
			$stmt = "SELECT * FROM  " . PFX . "address WHERE `customer` = :id AND `active` = 1";
			$this->sdb->query($stmt);
			$this->sdb->bind(':id',$id);
			$address = $this->sdb->resultset();
			if($address){
			for($i = 0; $i < count($address); ++$i){
			$aid = $address[$i]['id'];
			$address[$i]['id'] =  $crypt->encrypt($aid);
			}
			return $address ;
			}
			return false;
			}
			}
			public function status($id,$status){
			global $crypt;
			if($this->is_customer($id)){
			$id = $crypt->decrypt($id);
			$stmt = "UPDATE " . PFX . "customers SET `active` = :status  WHERE `id` = :id";
			$this->sdb->query($stmt);
			$this->sdb->bind(':id',$id);
			$this->sdb->bind(':status',$status);
			$result = $this->sdb->execute();
			if($result){
			$this->msg = "Operacion exitosa";
			return true;
			}
			$this->error = "Operacion fallida";
			return false;
			}
			$this->error = "No existe";
					return false;
			}
			public function search($q){
				global $crypt;
					$stmt ="SELECT * FROM  " . PFX . "customers WHERE (name LIKE :q OR email LIKE :q OR mobile LIKE :q) AND active = 1";
					$query = "%" .$q. "%";
					$this->sdb->query($stmt);
					$this->sdb->bind(':q',$query);
					$customers = $this->sdb->resultset();
						if($customers){
						for($i = 0; $i < count($customers); ++$i){
						$cid = $customers[$i]['id'];
						$customers[$i]['id'] =  $crypt->encrypt($cid);
						}
						return $customers ;
						}
					$this->error = "No hay resultados";
					return false;
				}
			}
?>