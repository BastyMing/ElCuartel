<?php 
class Address{
	var $error = '';
	var $msg = '';
	public $sdb;
	
	public function __construct(){
	global $db;
	 $this->sdb = $db;
	}
	 
  	public function is_address($id){
	global $crypt;
		$id = $crypt->decrypt($id);
		$stmt = "SELECT * FROM  " . PFX . "address WHERE id = :id";
		$this->sdb->query($stmt);
		$this->sdb->bind(':id',$id);
		$address = $this->sdb->single();
		if($address){
		$cid = $address['customer'];
		$address['customer'] =  $crypt->encrypt($cid);
		return $address ;
		}
	$this->error = "No such address exists";
	return false;
	}
	public function details($id){
		$details = $this->is_address($id);
		return $details;
	}
	
}

?>