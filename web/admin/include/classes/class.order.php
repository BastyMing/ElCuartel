<?php 

class Order{
		
	 var $error = '';
	 var $msg = '';
	public $sdb;
	
	public function __construct(){
	global $db;
	 $this->sdb = $db;
	}
		 
 
	public function all($parm = null, $value= null){
	global $crypt;
		if($parm && $value){
		$stmt = "SELECT * FROM  " . PFX . "orders WHERE `callback` != '0' AND $parm = '$value' ORDER BY id DESC";
		}else{
		$stmt = "SELECT * FROM  " . PFX . "orders WHERE `callback` != '0' ORDER BY id DESC";
		}
	$this->sdb->query($stmt);
	$orders = $this->sdb->resultset();
	for($i = 0; $i < count($orders); ++$i){
	$cid = $orders[$i]['customer'];
	$orders[$i]['customer'] =  $crypt->encrypt($cid);	
	$oid = $orders[$i]['id'];
	$orders[$i]['id'] =  $crypt->encrypt($oid);
	}
	return $orders;
	}
	public function is_order($id){
	global $crypt;
		$id = $crypt->decrypt($id);
			$stmt ="SELECT * FROM  " . PFX . "orders WHERE id = :id";
			$this->sdb->query($stmt);
			$this->sdb->bind(':id',$id);
			$result = $this->sdb->single();
			if($result ){
			$result['id']= $crypt->encrypt($result['id']);
			$result['customer']= $crypt->encrypt($result['customer']);
			$result['address']= $crypt->encrypt($result['address']);
			return $result;
				}
		$this->error = "No such order exists";
		return false;
	}
	
	public function details($id){
		$details = $this->is_order($id);
		return $details;
	}
	public function update($id,$column,$data){
	global $crypt;
	if($this->is_order($id)){
		$id = trim($id);
		$column = trim($column);
		$data = trim($data);
	 $id = $crypt->decrypt($id);
	$stmt = "UPDATE " . PFX . "orders  SET $column = :data WHERE id =:id";
			$this->sdb->query($stmt);
			$this->sdb->bind(':id',$id);
			$this->sdb->bind(':data',$data);
			$update = $this->sdb->execute();
			
	if($update){
		$this->msg = "Orden Actualizada";
		return true;
	}
	}
	$this->error = "Error";
	return false;
	}
}
?>