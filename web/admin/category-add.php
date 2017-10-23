<?php 
$pagename = 'Add category'; 
require_once('./include/admin-load.php');

if(isset($_REQUEST['cat_name']) ){

	
		
	$name = trim($_REQUEST['cat_name']);
	$result =$category->add($name,$slang);

}
if(!empty($category->msg)){
	$success = $category->msg;
	}
	if(!empty($category->error)){
	$error = $category->error;
	}
require_once('./header.php');

?><ul class="nav nav-pills"><li>
<a href="categories.php" >Categorias</a></li></ul>
<hr>
<form action="category-add.php" method="post" class="form-horizontal">

<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Nombre:</label><div class="col-md-4">
<input class="form-control" required type="text" name="cat_name" value="" id=""></div></div>
<div class="form-group"><div class="col-md-4 col-md-offset-3">
<button class="btn btn-primary">Guardar</button></div></div>
</form>

<?php
require_once('./footer.php');

?>