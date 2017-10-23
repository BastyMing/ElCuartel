<?php
/*
Filename: db.php
Last Modified: 30-Nov-2014
Function: Controls PDO handles
Thanks to Philip Brown (http://culttt.com/2012/10/01/roll-your-own-pdo-php-class/)
*/

class Db{
	private $internal_vars = array();
	protected $dbh;
	protected $stmt;
	protected $error;
	
	public function __construct(){
	
	
			$dbs = "mysql:host=" . DBHOST . ";dbname=" . DBNAME;
			try {
			$options = array(
						PDO::ATTR_PERSISTENT => true, 
						PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
						);
			$this->dbh = new PDO($dbs, DBUSER , DBPWD,$options); 
			} catch(PDOException $e) {
				die ('Database Connection Error'); 
			}
			return $this->dbh;
		
			
		
	
	}
	
	public function disconnect(){
			$this->dbh = NULL;
	}
	
	function __set($var,$val){
	$this->internal_vars[$var] = $val;
	}
	
	function __get($var){
		return  $this->internal_vars[$var];
	}
	
	public function query($query){
		$this->stmt = $this->dbh->prepare($query);
	}
	
	public function bind($param, $value, $type = null){
		if (is_null($type)) {
			switch (true) {
			case is_int($value):
				$type = PDO::PARAM_INT;
				break;
			case is_bool($value):
				$type = PDO::PARAM_BOOL;
				break;
			case is_null($value):
				$type = PDO::PARAM_NULL;
				break;
			default:
			$type = PDO::PARAM_STR;
			}
		}
	$this->stmt->bindValue($param, $value, $type);
	}
	
	public function execute(){
		return $this->stmt->execute();
	}
	
	public function resultset(){
		$this->execute();
		return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function single(){
		$this->execute();
		return $this->stmt->fetch(PDO::FETCH_ASSOC);
	}
	
	public function rowCount(){
		return $this->stmt->rowCount();
	}
	
	public function lastInsertId(){
		return $this->dbh->lastInsertId();
	}
	public function beginTransaction(){
		return $this->dbh->beginTransaction();
	}
	
	public function endTransaction(){
		return $this->dbh->commit();
	}
	
	public function cancelTransaction(){
		return $this->dbh->rollBack();
	}
	
	public function debugDumpParams(){
		return $this->stmt->debugDumpParams();
	}
	
}

?>