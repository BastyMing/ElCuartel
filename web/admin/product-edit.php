<?php

$pagename = 'Editar Producto';
require_once('./include/admin-load.php');
if(isset($_REQUEST['product_id'])){
	if(!empty($_REQUEST['product_id'])){
		$details =$product->details(trim($_REQUEST['product_id']));
		if(!empty($details)){
		if(empty($details['shipping'])){
		$details['shipping'] ='0';
		}}
	}else{
		header("location:products.php");
	}
}else{
		$details = $product->details('0');
		
	}
if(isset($_REQUEST['product_id']) && isset($_REQUEST['product_name']) && isset($_REQUEST['product_price'])&& isset($_REQUEST['product_description'])&& isset($_REQUEST['product_category'])&& isset($_REQUEST['product_stock']) && isset($_REQUEST['product_shipping'])){
		$product_id = 	trim($_REQUEST['product_id']);
		$product_name = trim($_REQUEST['product_name']);
		$product_price = trim($_REQUEST['product_price']);
		$product_description = trim($_REQUEST['product_description']);
		$product_category = trim($_REQUEST['product_category']);
		$product_stock = trim(($_REQUEST['product_stock']));
		$product_shipping = trim($_REQUEST['product_shipping']);
		$result = $product->update($product_id,$product_name,$product_price,$product_description,$product_category,$product_stock,$product_shipping);
		$details =$product->details(trim($_REQUEST['product_id']));
	}
if(!empty($product->msg)){
	$success = $product->msg;
}
	if(!empty($product->error)){
	$error = $product->error;
	}
$cats = $category->all();
require_once('./header.php');
if(!empty($details)){ 
?>
<ul class="nav nav-pills"><li><a href="products.php" >Productos</a></li></ul>
<hr>
<a href="product-images.php?product_id=<?php echo $details['id']; ?>" class="btn btn-primary "><i class="glyphicon glyphicon-camera"></i> añadir imagen</a> <a href="product-update-regions.php?product_id=<?php echo $details['id']; ?>" class="btn btn-primary "><i class="glyphicon glyphicon-road"></i> añadir regiones de envio</a>
<hr>
<form action="product-edit.php?product_id=<?php echo $details['id']; ?>" method="post" class="form-horizontal">
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Id</label><div class="col-md-4">
<input class="form-control"required type="text" name="id" value="<?php echo $details['id']; ?>" disabled></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="product-name">Nombre</label><div class="col-md-4">
<input class="form-control"required type="text" name="product_name" value="<?php echo $details['name']; ?>" id="product-name" ></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="product-price">Precio (<?php echo $setting['currency_symbol'] ; ?>)</label><div class="col-md-4">
<input class="form-control"required type="text" name="product_price" value="<?php echo $details['price']; ?>" id="product-price"></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="product-description">Descripcion</label><div class="col-md-4">
<textarea class="form-control" required name="product_description" style="width:300px;height:100px;" id="product-description"><?php echo $details['description']; ?></textarea></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="product-category">Categoria</label><div class="col-md-4">
<select class="form-control" name="product_category" id="product-category">
<?php
foreach($cats as $cat){
if($details['category'] == $cat['id']){
echo "<option selected value=\"" . $cat['id']. "\">".$cat['name']."</option>";
}else{
echo "<option value=\"" . $cat['id']. "\">".$cat['name']."</option>";
}
}
?></select></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="product-shipping">Envio(<?php echo $setting['currency_symbol'] ; ?>)</label><div class="col-md-4">
<input class="form-control"required type="text" name="product_shipping" value="<?php echo $details['shipping']; ?>" id="product-shipping"></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="product-stock">Stock</label><div class="col-md-4">
<input class="form-control"required type="text" name="product_stock" value="<?php echo $details['stock']; ?>" id="product-stock"></div></div>

<div class="form-group"><div class="col-md-4 col-md-offset-3">
<button class="btn btn-primary">Actalizar</button></div>
</div>
</table>
</form>
<?php } ?>
<?php
require_once('./footer.php');
?>