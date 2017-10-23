<?php 
class Product{
	var $error = '';
	var $msg = '';
	public $sdb;
	
	public function __construct(){
	global $db;
	 $this->sdb = $db;
	}
	
	public function all(){
	$stmt = "SELECT * FROM  " . PFX . "products WHERE active = 1";
	$this->sdb->query($stmt);
	$products = $this->sdb->resultset();
	if($products){
	for($i = 0; $i < count($products); ++$i){
	$pid = $products[$i]['id'];
	$products[$i]['image'] = $this->get_primary_image($pid);
	}
	return $products ;
	}
	return false;
	}
	public function per_page($start,$total){
	$stmt = "SELECT * FROM  " . PFX . "products WHERE active = 1 LIMIT :start, :total";
	$this->sdb->query($stmt);
	$this->sdb->bind(':start',$start);
	$this->sdb->bind(':total',$total);
	$products = $this->sdb->resultset();
	if($products){
	for($i = 0; $i < count($products); ++$i){
	$pid = $products[$i]['id'];
	$products[$i]['image'] = $this->get_primary_image($pid);
	}
	return $products ;
	}
	return false;
	}
	public function count_all(){
	$stmt = "SELECT * FROM  " . PFX . "products WHERE active = 1";
	$this->sdb->query($stmt);
	$products = $this->sdb->execute();
	$products = $this->sdb->rowCount();
	return $products ;
	}	
	public function by_category($cat){
	$stmt = "SELECT * FROM  " . PFX . "products WHERE category = :cat  AND active = 1";
	$this->sdb->query($stmt);
	$this->sdb->bind(':cat',$cat);
	$products = $this->sdb->resultset();
	if($products){
	for($i = 0; $i < count($products); ++$i){
	$pid = $products[$i]['id'];
	$products[$i]['image'] = $this->get_primary_image($pid);
	}
	return $products ;
	}
	return false;
	}	
	
	public function no_stock(){
	$stmt = "SELECT * FROM  " . PFX . "products WHERE  stock <=5   AND active = 1";
	$this->sdb->query($stmt);
	$products = $this->sdb->resultset();
	if($products){
	for($i = 0; $i < count($products); ++$i){
	$pid = $products[$i]['id'];
	$products[$i]['image'] = $this->get_primary_image($pid);
	}
	return $products ;
	}
	return false;
	}
	public function is_product($id){
	$stmt = "SELECT * FROM  " . PFX . "products WHERE active = 1  AND id = :id";
	$this->sdb->query($stmt);
	$this->sdb->bind(':id',$id);
	$product = $this->sdb->single();
	if($product){
	$pid = $product['id'];
	$product['image'] = $this->get_primary_image($pid);
	return $product ;
	}
	$this->error = "El producto no existe";
	return false;
	}
	public function details($id){
		$details = $this->is_product($id);
		return $details;
	}
	public function add($name,$price,$description,$cat,$stock,$shipping ='0'){
		$name = trim($name);
		$price = trim($price);
		$description = trim($description);
		$cat = trim($cat);
		$stock = trim($stock);
		$shipping = trim($shipping);

	if(empty($price) || empty($name)){
			$this->error = 'Ingrese nombre y precio del producto';
			return false;
		}
		if(!is_numeric($price)){
			$this->error = 'precio invalido';
			return false;
		}if(!is_numeric($cat)){
			$this->error = 'Categoria invalida';
			return false;
		}
		if(!is_numeric($stock)){
			$this->error = 'Stock invalido';
			return false;
		}
		if(!is_numeric($shipping)){
			$this->error = 'precio de envio invalido';
			return false;
		}
		$shipping = number_format($shipping ,2,'.','');
		$price = number_format($price ,2,'.','');
		$stmt = "INSERT INTO " . PFX . "products (`id`, `name`, `price`,`description`,`category`,`stock`,`shipping`,`active`) VALUES (NULL, :name  , :price  ,:description ,:cat ,:stock , :shipping, '1')";
		$this->sdb->query($stmt);
		$this->sdb->bind(':name',$name);
		$this->sdb->bind(':price',$price);
		$this->sdb->bind(':description',$description);
		$this->sdb->bind(':cat',$cat);
		$this->sdb->bind(':stock',$stock);
		$this->sdb->bind(':shipping',$shipping);
		$add = $this->sdb->execute();
	if($add){
		$this->msg = "Producto añadido";
		return true;
		}	
		$this->error = 'Error';
		return false;	
	}
	public function add_option($id,$name,$price){
		$name = trim($name);
		$price = trim($price);
		
		// $price = number_format($price, 2, '.', '');
		if($this->is_product($id)){
		if(empty($price) || empty($name)){
			$this->error = 'Ingrese nombre y precio del producto';
			return false;
		}
		if(!is_numeric($price)){
			$this->error = 'Precio invalido';
			return false;
		}
		$price = number_format($price ,2,'.','');
			$stmt= "INSERT INTO " . PFX . "options (`id`, `product_id`, `name`,`price`,`active`) VALUES (NULL, :id , :name,:price,'1')";
		$this->sdb->query($stmt);
		$this->sdb->bind(':name',$name);
		$this->sdb->bind(':price',$price);
		$this->sdb->bind(':id',$id);
		$add = $this->sdb->execute();
			if($add){
		$this->msg = "Opcion de producto añadida";
		return true;
		}	
		$this->error = 'Error';
		return false;
		}
		return false;
	}
public function update($id,$name,$price,$description,$cat,$stock,$shipping ='0'){
		$name = trim($name);
		$price = trim($price);
		$description = trim($description);
		$stock = trim($stock);
		$shipping = trim($shipping);
		$cat = trim($cat);
		if($this->is_product($id)){
		if(empty($price) || empty($name)){
			$this->error = 'Ingrese nombre y precio del producto';
			return false;
		}
		if(!is_numeric($price)){
			$this->error = 'precio invalido';
			return false;
		}if(!is_numeric($cat)){
			$this->error = 'categoria invalida';
			return false;
		}
			if(!is_numeric($stock)){
			$this->error = 'stock invalido';
			return false;
		}
		if(!is_numeric($shipping)){
			$this->error = 'precio de envio invalido';
			return false;
		}
		$price = number_format($price ,2,'.','');
		$shipping = number_format($shipping ,2,'.','');
		$stmt = "UPDATE " . PFX . "products  SET `name` = :name,`price` = :price,`description` = :description,`category`=:cat,`stock` = :stock,`shipping`=:shipping WHERE id =:id";
		$this->sdb->query($stmt);
		$this->sdb->bind(':name',$name);
		$this->sdb->bind(':price',$price);
		$this->sdb->bind(':description',$description);
		$this->sdb->bind(':cat',$cat);
		$this->sdb->bind(':stock',$stock);
		$this->sdb->bind(':shipping',$shipping);
		$this->sdb->bind(':id',$id);
		$update = $this->sdb->execute();
								
	if($update){
		$this->msg = "actualizado correctamente";
		return true;
	}
	$this->error = "Error";
	return false;
	}
	$this->error = "Error";
	return false;
	}
	
	public function update_regions($id,$regions){
		$id = trim($id);
		$regions = trim($regions);
		if($this->is_product($id)){

		$stmt = "UPDATE " . PFX . "products  SET `regions` = :regions WHERE id =:id";
		$this->sdb->query($stmt);
		$this->sdb->bind(':regions',$regions);
		$this->sdb->bind(':id',$id);
		$update = $this->sdb->execute();
								
	if($update){
		$this->msg = "actualizado correctamente";
		return true;
	}
	$this->error = "Error";
	return false;
	}
	$this->error = "Error";
	return false;
	}
	
	public function remove($id){
		if($this->is_product($id)){
		$img = $this->details($id);
		$img = $img['image'];
		$stmt = "UPDATE " . PFX . "products  SET `active` = '0' WHERE id =:id";
		$this->sdb->query($stmt);
		$this->sdb->bind(':id',$id);
		$update = $this->sdb->execute();
								
	if($update){
		$this->msg = "removido correctamente";
		return true;
	}
	$this->error = "Error";
	return false;
	}
	$this->error = "Error";
	return false;
	}
	
	
	
	
	public function options($id){
		if($this->is_product($id)){
	
		$stmt = "SELECT * FROM " . PFX . "options WHERE product_id = :id AND active = '1'";
		$this->sdb->query($stmt);
		$this->sdb->bind(':id',$id);
		$products = $this->sdb->resultset();
		if($products){
		return $products ;
		}
		}
		$this->error = "no se encuentra el producto";
		return false;
	}
	
	public function option_details($id){
		$stmt = "SELECT * FROM " . PFX . "options WHERE id = :id AND active = '1'";
		$this->sdb->query($stmt);
		$this->sdb->bind(':id',$id);
		$product = $this->sdb->single();
		if($product){
		return $product ;
		}
		$this->error = "no se encuentra el producto";
		return false;
	}
	
	public function edit_option($id,$name,$price){
			if(!is_numeric($price)){
			$this->error = 'precio invalido';
			return false;
			}
			$stmt ="UPDATE " . PFX . "options  SET `name` = :name , `price` =:price  WHERE id =:id";
			$this->sdb->query($stmt);
			$this->sdb->bind(':id',$id);
			$this->sdb->bind(':name',$name);
			$this->sdb->bind(':price',$price);
			$update = $this->sdb->execute();							
	if($update){
		return true;
	}
	$this->error = "Error";
	return false;
	}	
	public function remove_option($id){
			$stmt ="UPDATE " . PFX . "options  SET `active` = '0' WHERE id =:id";
			$this->sdb->query($stmt);
			$this->sdb->bind(':id',$id);
			$update = $this->sdb->execute();							
	if($update){
		return true;
	}
	$this->error = "Error";
	return false;
	}
	public function by_region($region){
		$stmt = "SELECT * FROM  " . PFX . "products WHERE active = 1  AND region = :region";
		$this->sdb->query($stmt);
		$this->sdb->bind(':region',$region);
		$products = $this->sdb->resultset();
		if($products){
		for($i = 0; $i < count($products); ++$i){
		$pid = $products[$i]['id'];
		$products[$i]['image'] = $this->get_primary_image($pid);
		}
		return $products ;
		}
		return false;
	}
		public function search($q){
		
		$stmt ="SELECT * FROM  " . PFX . "products WHERE (name LIKE :q OR description LIKE :q) AND active = 1";
		$query = "%" .$q. "%";
		$this->sdb->query($stmt);
		$this->sdb->bind(':q',$query);
		$products = $this->sdb->resultset();
		if($products){
		for($i = 0; $i < count($products); ++$i){
		$pid = $products[$i]['id'];
		$products[$i]['image'] = $this->get_primary_image($pid);
		}
		return $products ;
		}
		$this->error = "No hay resultados";
		return false;
	}
	
	function get_images($id){
		$stmt = "SELECT * FROM  " . PFX . "products_images WHERE product_id = :id AND `active` = 1";
		$this->sdb->query($stmt);
		$this->sdb->bind(':id',$id);
		$images = $this->sdb->resultset();
		if($images){
		return $images ;
		}
		return false;
	}
		
	function get_primary_image($id){
		$stmt = "SELECT * FROM  " . PFX . "products_images WHERE `product_id` = :id AND `primary` = 1 AND `active` = 1";
		$this->sdb->query($stmt);
		$this->sdb->bind(':id',$id);
		$image = $this->sdb->single();
		if($image){
		return $image['image'] ;
		}
		return 'no-image.jpg';
	}
	
	function set_primary_image($pid,$id){
			$stmt ="UPDATE " . PFX . "products_images  SET `primary` = '0' WHERE `product_id` = :pid";
			$this->sdb->query($stmt);
			$this->sdb->bind(':pid',$pid);
			$update = $this->sdb->execute();
			
			$stmt ="UPDATE " . PFX . "products_images  SET `primary` = '1' WHERE `product_id` = :pid AND `id` = :id";
			$this->sdb->query($stmt);
			$this->sdb->bind(':pid',$pid);
			$this->sdb->bind(':id',$id);
			$update = $this->sdb->execute();
			if($update){
			$this->msg = "imagen de producto añadida";
			return true;
			}
			$this->error = "Error";
			return false;
			}
	
	function add_image($id,$image,$primary = '0'){
		if($this->is_product($id)){
		if(empty($image)){ 
		$this->error = 'actualize la imagen';
		return false;
		}
		$stmt = "INSERT INTO " . PFX . "products_images (`id`, `product_id`, `image`,`primary`,`active`) VALUES (NULL, :id  ,:image ,:primary,'1')";
		$this->sdb->query($stmt);
		$this->sdb->bind(':id',$id);
		$this->sdb->bind(':image',$image);
		$this->sdb->bind(':primary',$primary);
		$add = $this->sdb->execute();
	if($add){
		$this->msg = "imagen de producto añadida";
		
		rename(ABSPATH.'/upload_temp/'.$image,IMGPATH.$image);
		rename(ABSPATH.'/upload_temp/small-'.$image,IMGPATH.'small-'.$image);
		rename(ABSPATH.'/upload_temp/medium-'.$image,IMGPATH.'medium-'.$image);
		rename(ABSPATH.'/upload_temp/large-'.$image,IMGPATH.'large-'.$image);

		if(isset($_SESSION['uploaded_temp'])){
		foreach($_SESSION['uploaded_temp'] as $temp_image){
		if($temp_image != $image){
		unlink(ABSPATH.'/upload_temp/small-'.$temp_image);
		unlink(ABSPATH.'/upload_temp/medium-'.$temp_image);
		unlink(ABSPATH.'/upload_temp/large-'.$temp_image);
		unlink(ABSPATH.'/upload_temp/'.$temp_image);
		
		}
		}
		unset($_SESSION['uploaded_temp']);
		}
		return true;
		}	
		}
		$this->error = 'Error';
		return false;	
	}
	
	public function remove_image($pid,$id){
			$stmt = "SELECT * FROM  " . PFX . "products_images WHERE `product_id` = :pid AND `id` = :id";
			$this->sdb->query($stmt);
			$this->sdb->bind(':pid',$pid);
			$this->sdb->bind(':id',$id);
			$image = $this->sdb->single();
			$img = $image['image'];
			
			$stmt ="UPDATE " . PFX . "products_images  SET `active` = '0' WHERE  `product_id` = :pid AND `id` =:id";
			$this->sdb->query($stmt);
			$this->sdb->bind(':pid',$pid);
			$this->sdb->bind(':id',$id);
			$update = $this->sdb->execute();							
			if($update){
			
			unlink(IMGPATH . 'small-'.$img);
			unlink(IMGPATH . 'medium-'.$img);
			unlink(IMGPATH . 'large-'.$img);
			unlink(IMGPATH . $img);
			$this->msg = "imagen de producto removida";
			return true;
			
		}
	$this->error = "Error ";
	return false;
	}
	
}
?>