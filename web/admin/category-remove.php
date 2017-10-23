<?php 

$pagename = 'Remover categorias'; 
require_once('./include/admin-load.php');
if(isset($_REQUEST['cat_id'])){
	if(!empty($_REQUEST['cat_id'])){
		$details =$category->details(trim($_REQUEST['cat_id']));
	}else{
		header("location:categories.php");
	}
}else{
		$details = $category->details('0');
	}
if(isset($_REQUEST['cat_id']) && 'delete' == @$_REQUEST['action']){
if(!empty($_REQUEST['cat_id'])){
	
		$result = $category->remove($_REQUEST['cat_id']);
		unset($details);

			}
	
}	

if(!empty($category->msg)){
	$success = $category->msg;
	}
	if(!empty($category->error)){
	$error = $category->error;
	}
	
require_once('./header.php');

?>
<ul class="nav nav-pills"><li>
<a href="categories.php" >Categorias</a></li></ul>
<hr>
<?php 

if(isset($details)){ 
//print_r($details);
	?>
<h3>¿Está seguro que desea remover esta categoria?</h3>
<form action="category-remove.php?cat_id=<?php echo $details['id']; ?>" method="post" class="form-horizontal">
<table class="main-table">
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Nombre</label><div class="col-md-4">
<input class="form-control"type="text" name="id" value="<?php echo $details['name']; ?>" disabled></div></div>

<div class="form-group"><div class="col-md-4 col-md-offset-3">
<input class="form-control"type="hidden" name="action" value="delete">
<button class="btn btn-danger">Si, estoy seguro</button></div></div>
</form>
<?php } ?>
<?php
require_once('./footer.php');

?>