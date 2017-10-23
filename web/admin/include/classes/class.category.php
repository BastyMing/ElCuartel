<?php 
class Category{
	var $error = '';
	var $msg = '';
	public $sdb;
	
	public function __construct(){
	global $db;
	 $this->sdb = $db;
	}
	
	public function all(){
	$stmt = "SELECT * FROM  " . PFX . "categories WHERE active = 1";
	$this->sdb->query($stmt);
	$products = $this->sdb->resultset();
	if($products){
	return $products ;
	}
	return false;
	}	
	public function is_category($id){
		$stmt = "SELECT * FROM  " . PFX . "categories WHERE active = 1  AND id = :id";
		$this->sdb->query($stmt);
		$this->sdb->bind(':id',$id);
		$category = $this->sdb->single();
		if($category){
		return $category ;
		}
		$this->error = "No existen categorias";
		return false;
	}
	public function details($id){
		$details = $this->is_category($id);
		return $details;
	}
	public function add($name){
		$name = trim($name);
		
		
		if(empty($name)){
			$this->error = 'Porfavor ingrese nombre de la Categoria';
			return false;
		}
		$stmt = "INSERT INTO " . PFX . "categories (`id`, `name`,`products`,`active`) VALUES (NULL, :name  ,'0','1')";
		$this->sdb->query($stmt);
		$this->sdb->bind(':name',$name);
		$add = $this->sdb->execute();
	if($add){
		$this->msg = "Categoria añadida satisfactoriamente";
		return true;
		}	
		$this->error = 'Error al añadir la categoria';
		return false;	
	}
	
	public function update($id,$name,$products){
		$name = trim($name);
		$products = trim($products);
		if($this->is_category($id)){
		
		$stmt = "UPDATE " . PFX . "categories  SET `name` = :name ,`products` = :products  WHERE id =:id";
		$this->sdb->query($stmt);
		$this->sdb->bind(':name',$name);
		$this->sdb->bind(':products',$products);
		$this->sdb->bind(':id',$id);
		$update = $this->sdb->execute();
								
	if($update){
		$this->msg = "Categoría actualizada satisfactoriamente";
		return true;
	}
	$this->error = "Error al guardar la categoria";
	return false;
	}
	$this->error = "Error al guardar la categoria";
	return false;
	}
	public function remove($id){
		if($this->is_category($id)){
		$img = $this->details($id);
		$img = $img['image'];
		
		$stmt = "UPDATE " . PFX . "categories  SET `active` = '0'  WHERE id =:id";
		$this->sdb->query($stmt);
		$this->sdb->bind(':id',$id);
		$update = $this->sdb->execute();
								
	if($update){
	$this->msg  =  "Categoria removida satisfactoriamente";
		return true;
	}
	$this->error = "Error al remover";
	return false;
	}
	$this->error = "Error al remover";
	return false;
	}
}
?>