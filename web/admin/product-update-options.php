<?php 
$pagename = 'Añadir opciones'; 
require_once('./include/admin-load.php');
if(isset($_REQUEST['product_id'])){
	if(!empty($_REQUEST['product_id'])){
		$details =$product->details(trim($_REQUEST['product_id']));
			if(!empty($product->error)){
		unset($details);
	}
	}else{
		header("location:products.php");
	}
}else{
		$details = $product->details('0');
	}
	
	if(isset($_REQUEST['action'])){
	switch ($_REQUEST['action']){
	case 'add':
	if(isset($_REQUEST['product_id']) && isset($_REQUEST['product_name']) && isset($_REQUEST['product_price'])){
	$product_name = trim($_REQUEST['product_name']);
	$product_id = trim($_REQUEST['product_id']);
	$product_name = trim($_REQUEST['product_name']);
	$product_price = trim($_REQUEST['product_price']);
	$result =$product->add_option($product_id,$product_name, $product_price);
	}
	break;
	case 'edit':
	if(isset($_REQUEST['product_id']) && ($_REQUEST['option_id']) && isset($_REQUEST['product_name']) && isset($_REQUEST['product_price'])){
	$product_name = trim($_REQUEST['product_name']);
	$product_id = trim($_REQUEST['product_id']);
	$option_id = trim($_REQUEST['option_id']);
	$product_name = trim($_REQUEST['product_name']);
	$product_price = trim($_REQUEST['product_price']);
	$result =$product->edit_option($option_id,$product_name, $product_price);
	}
	break;
	case 'remove':
	$rid = trim($_REQUEST['remove']);
	$product->remove_option($rid);
	break;
	}}


if(isset($_REQUEST['remove'])){
	
	$rid = trim($_REQUEST['remove']);
	$product->remove_option($rid);
}



if(!empty($product->msg)){
	$success = $product->msg;
	}
	if(!empty($product->error)){
	$error = $product->error;
	}	
require_once('./header.php');

?>
<ul class="nav nav-pills"><li>
<a href="products.php">Productos</a></li><li><a href="product-add.php">Añadir</a>
</li></ul>
<hr>
<?php 
if(isset($details)){ 
?>

<table><tr>
<td><img src="<?php echo EXTIMGPATH; ?>medium-<?php echo $details['image']; ?>" /></td>
<td><table>
<tr><td>ID: <?php echo $details['id']; ?></td></tr>
<tr><td><h4><?php echo $details['name']; ?></h4></td></tr>
<tr><td>Precio: <?php echo $setting['currency_symbol'] . $details['price']; ?></td></tr>
</table></td></tr></table><br />
<?php
 if(isset($_REQUEST['edit'])){
 $option = $product->option_details($_REQUEST['edit']);
?>
<form action="product-update-options.php?action=edit&option_id=<?php echo $option['id']; ?>&product_id=<?php echo $details['id']; ?>" method="post" class="form-horizontal">
<h3>Editar opciones</h3>
<div class="form-group"><label class="col-md-3 control-label text-right" for="product-name">Nombre</label><div class="col-md-4">
<input class="form-control"type="text" name="product_name" value="<?php echo  $option ['name']; ?>" id="product-name">
</div></div>
<div class="form-group"><label class="col-md-3 control-label text-right" for="product-price">Precio (<?php echo $setting['currency_symbol'] ; ?>)</label><div class="col-md-4">
<input class="form-control"type="text" name="product_price" value="<?php echo  $option['price']; ?>" id="product-price">
</div></div>

<div class="form-group"><div class="col-md-4 col-md-offset-3">
<button class="btn btn-primary">Guardar</button>
</div></div>
<?php
}else{
?>
<h3>Opciones Actuales:</h3>
<?php 
$options = $product->options($details['id']);
foreach ($options as $option){
echo $option['name'] ." - " . $setting['currency_symbol'] . " " . $option['price'] . " - <a href='product-update-options.php?edit=" . $option['id'] . "&product_id=". $details['id'] ."'>Editar</a> | <a href='product-update-options.php?action=remove&remove=" . $option['id'] . "&product_id=". $details['id'] ."'>Remover</a><br />";
 } ?>
 <br>
<form action="product-update-options.php?action=add&product_id=<?php echo $details['id']; ?>" method="post" class="form-horizontal">
<h3>Añadir nueva opcion</h3>
<div class="form-group"><label class="col-md-3 control-label text-right" for="product-name">Nombre</label><div class="col-md-4">
<input class="form-control"type="text" name="product_name" value="" id="product-name">
</div></div>
<div class="form-group"><label class="col-md-3 control-label text-right" for="product-price">Precio (<?php echo $setting['currency_symbol'] ; ?>)</label><div class="col-md-4">
<input class="form-control"type="text" name="product_price" value="" id="product-price">
</div></div>

<div class="form-group"><div class="col-md-4 col-md-offset-3">
<button class="btn btn-primary">añadir opcion</button>
</div></div>
<?php } ?>
</form>
<?php } ?>
<?php
require_once('./footer.php');

?>