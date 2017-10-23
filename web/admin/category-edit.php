<?php 
$pagename = 'Editar Categoria'; 
require_once('./include/admin-load.php');
if(isset($_REQUEST['category_id'])){
	if(!empty($_REQUEST['category_id'])){
		$details =$category->details(trim($_REQUEST['category_id']));
	}else{
		header("location:categories.php");
	}
}else{
		$details = $category->details('0');
	}
if(isset($_REQUEST['category_id']) && isset($_REQUEST['category_name']) ){
	
		$category_id = 	trim($_REQUEST['category_id']);
		$category_name = 	trim($_REQUEST['category_name']);
		$result = $category->update($category_id,$category_name,$category_slang,'0');
		$details =$category->details(trim($_REQUEST['category_id']));
	
		
	
}
if(!empty($category->msg)){
	$success = $category->msg;
	}
	if(!empty($category->error)){
	$error = $category->error;
	}	
require_once('./header.php');

?>
<ul class="nav nav-pills"><li><a href="categories.php">Categorias</a></li><li><a href="category-add.php" >Añadir</a></li></ul>
<hr>
<?php 

if(isset($details)){ 
?>
<form action="category-edit.php?category_id=<?php echo $details['id']; ?>" method="post" class="form-horizontal">

<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Nombre:</label><div class="col-md-4">
<input class="form-control"type="text" name="category_name" value="<?php echo $details['name']; ?>"  ></div></div>



<div class="form-group"><div class="col-md-4 col-md-offset-3">
<button class="btn btn-primary">Guardar</button></div></div>
</form>
<?php } ?>
<?php
require_once('./footer.php');

?>