<?php
$pagename = 'Product Details'; 
require_once('./include/admin-load.php');
if(isset($_REQUEST['id'])){
	if(!empty($_REQUEST['id'])){
		$details =$product->details(trim($_REQUEST['id']));
		$cd = $category->details($details['category']);
		$details['category'] = $cd['name'];
		$images = $product->get_images($_REQUEST['id']);
	}else{
		header("location:products.php");
	}
}else{
		$details = $product->details('0');
		
	}
	if(!empty($product->msg)){
	$success = $product->msg;
}
	if(!empty($product->error)){
	$error = $productt->error;
	}
require_once('./header.php');
if(!empty($details)){ 
?>
<ul class="nav nav-pills"><li><a href="products.php" >Productos</a></li></ul>
<hr>
<div class="row">
<div class="col-md-3" >ID</div><div class="col-md-9">
<?php echo $details['id']; ?></div>

<div class="col-md-3" >Nombre</div><div class="col-md-9"><?php echo $details['name']; ?></div>

<div class="col-md-3" for="product-price">Precio (<?php echo $setting['currency_symbol'] ; ?>)</div><div class="col-md-9">
<?php echo $details['price']; ?></div>

<div class="col-md-3" for="product-description">Descripcion</div><div class="col-md-9"><?php echo $details['description']; ?></div>

<div class="col-md-3" for="product-category">Categoria</div><div class="col-md-9">
<?php echo $details['category']; ?>
</div>

<div class="col-md-3" for="product-shipping">Envio(<?php echo $setting['currency_symbol'] ; ?>)</div><div class="col-md-9">
<?php echo $details['shipping']; ?></div>

<div class="col-md-3" for="product-stock">Stock</div><div class="col-md-9"><?php echo $details['stock']; ?></div>
</div>
<h3>Imagenes:</h3>
<div class="row"><div class="col-md-12">
<?php
foreach($images as $img){
?>
<div class="product-img">

  <img src='<?php echo EXTIMGPATH; ?>medium-<?php echo $img['image']; ?>'>

</div>
<?php
}
?>
</div></div>
<div class="row"><div class="col-md-12"><ul class="pagination"><li><a title="Add Product Images" href="product-images.php?product_id=<?php echo $details['id']; ?>"><i class="glyphicon glyphicon-camera"></i>Administrar imagenes</a></li><li><a href="product-update-options.php?product_id=<?php echo $details['id']; ?>" title="Add / Remove options"><i class="glyphicon glyphicon-plus"></i> Administrar opciones"</a></li><li><a href="product-update-regions.php?product_id=<?php echo $details['id']; ?>" title="Add / Remove Shipping regions"><i class="glyphicon glyphicon-road"></i>Administrar regiones de envio</a></li><li><a href="product-edit.php?product_id=<?php echo $details['id']; ?>" title="Edit Product"><i class="glyphicon glyphicon-pencil"></i> Editar producto/a></li><li><a href="product-remove.php?product_id=<?php echo $details['id']; ?>" title="Remove Product"><i class="glyphicon glyphicon-trash"></i> Remover producto</a></li></ul></div></div>
<?php } ?>
<?php
require_once('./footer.php');
?>