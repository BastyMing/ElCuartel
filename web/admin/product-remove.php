<?php 

$pagename = 'Remover Producto'; 
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
if(isset($_REQUEST['product_id']) && isset($_REQUEST['action'])){
if(!empty($_REQUEST['product_id']) && $_REQUEST['action'] =="delete"){
	
		$result = $product->remove($_REQUEST['product_id']);
		unset($details);

			}
	
}
if(!empty($product->msg)){
	$success = $product->msg;
	}
	if(!empty($product->error)){
	$error = $product->error;
	}	
require_once('./header.php');

?>
<ul class="nav nav-pills"><li><a href="products.php" >Productos</a></li></ul>
<hr>
<?php 
if(isset($details)){ 
?>
<h3>¿Éstas seguro que deseas remover "<?php echo $details['name']; ?>"?</h3>

<table><tr>
<td><img src="<?php echo $setting['website_url']; ?>/images/products/medium-<?php echo $details['image']; ?>" /></td>
<td><table>
<tr><td>ID: <?php echo $details['id']; ?></td></tr>
<tr><td><h4><?php echo $details['name']; ?></h4></td></tr>
<tr><td>Precio: <?php echo $setting['currency_symbol'] . $details['price']; ?></td></tr>
</table></td></tr></table><br />
<form action="product-remove.php?product_id=<?php echo $details['id']; ?>" method="post" ><input class="form-control"type="hidden" name="action" value="delete">
<button class="btn btn-danger">Si, estoy seguro</button>
</form>
<?php } ?>
<?php
require_once('./footer.php');

?>