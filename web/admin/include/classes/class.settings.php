<?php 

class Settings{
	var $error = '';
	var $msg = '';
	public $sdb;
	
	public function __construct(){
	global $db;
	 $this->sdb = $db;
	}
	
	public function get_all(){
	$setting = array();
	
	$stmt = "SELECT * FROM  " . PFX . "settings";
	$this->sdb->query($stmt);
	$rows = $this->sdb->resultset();
	foreach($rows as $row){
		$setting[$row['setting']] = $row['value'];
	}
		
	return $setting;
	}
	public function update($newsettings){
		//print_r($newsettings);
		foreach($newsettings as $key => $value){
	$stmt = "UPDATE " . PFX . "settings  SET `value` = :val WHERE setting =:key";
	$this->sdb->query($stmt);
	$this->sdb->bind(':val',$value);
	$this->sdb->bind(':key',$key);
	$update = $this->sdb->execute();
	if(!$update){
	$this->error = "Error";
	return false;	
	}
	}
	if(empty($this->error)){
	$this->msg = "Actualizado";
	return true;
	}
	}
}

?>