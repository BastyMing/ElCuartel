<?php
$pagename = 'Añadir imagen';
require_once('./include/admin-load.php');

	if(isset($_REQUEST['action'])){
	switch ($_REQUEST['action']){
		case 'make_primary':
		if(isset($_REQUEST['product_id'])  && isset($_REQUEST['img_id'])){
			$result = $product->set_primary_image($_REQUEST['product_id'],$_REQUEST['img_id']);
		}
		break;
		
		case 'remove':
		if(isset($_REQUEST['product_id'])  && isset($_REQUEST['img_id'])){
			$result = $product->remove_image($_REQUEST['product_id'],$_REQUEST['img_id']);
		}
		break;
		
		case 'add':
		if(isset($_REQUEST['product_id'])  && isset($_REQUEST['product_image'])){
		$product_id = 	trim($_REQUEST['product_id']);
		$product_image = trim($_REQUEST['product_image']);
		$result = $product->add_image($product_id,$product_image);
		}
		break;
	}
	}

if(isset($_REQUEST['product_id'])){
	if(!empty($_REQUEST['product_id'])){
		$details =$product->details(trim($_REQUEST['product_id']));
		if($details){
		$images = $product->get_images($_REQUEST['product_id']);
	}
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
	$error = $product->error;
	}
$regions = $shipping->region_all();	
$cats = $category->all();
require_once('./header.php');
?>
<ul class="nav nav-pills"><li><a href="product-edit.php?product_id=<?php echo $details['id']; ?>" >Volver</a></li><li><a href="products.php" >Todos los productos</a></li></ul>
<hr>
<?php 
if(!empty($details)){ 
?>
<table><tr>
<td><img class="img-thumbnail" src="<?php echo EXTIMGPATH; ?>medium-<?php echo $details['image']; ?>" style="margin-right:10px;" /></td>
<td><table>
<tr><td>ID: <?php echo $details['id']; ?></td></tr>
<tr><td><h4><?php echo $details['name']; ?></h4></td></tr>
<tr><td>Price: <?php echo $setting['currency_symbol'] . $details['price']; ?></td></tr>
</table></td></tr></table><br />
<h3>Imagen de producto:</h3>
<div class="row"><div class="col-md-12">
<?php
foreach($images as $img){
?>
<div class="product-img">

  <img src='<?php echo EXTIMGPATH; ?>medium-<?php echo $img['image']; ?>'>

  <div class="desc">
  <a class='btn btn-primary' href='product-images.php?action=make_primary&img_id=<?php echo $img['id']; ?>&product_id=<?php echo $details['id']; ?>'>Default</a>
   <a class='btn btn-danger' href='product-images.php?action=remove&img_id=<?php echo $img['id']; ?>&product_id=<?php echo $details['id']; ?>'><i class="glyphicon glyphicon-remove"></i></a>
  </div>
</div>
<?php
}
?>
</div></div>
<h3>añadir imagen:</h3>
<form action="product-images.php?action=add&product_id=<?php echo $details['id']; ?>" method="post" class="form-horizontal">
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Imagen:</label><div class="col-md-4">
     	<!-- begin display uploaded image --><a href="#" class="btn btn-primary" id="img_init"><i class="glyphicon glyphicon-camera"></i> Click Para subir imagen</a>
			<div id="upload_area" class="corners align_center">
			<input class="form-control" type="hidden" name="product_image" id="product-image" value="">
         	</div><!-- begin display uploaded image -->
</div></div>
<div class="form-group"><div class="col-md-4 col-md-offset-3">
<button class="btn btn-primary">Guardar</button></div>
</div>
</table>
</form>
<form action="upload.php" method="post" name="image_upload" id="image_upload" enctype="multipart/form-data"  style="display:none;">
        <!-- begin image label and input -->
		<label>Subir imagen (gif, jpg, png)</label>
		<input class="form-control"required type="file" size="45" name="uploadfile" id="uploadfile" class="file margin_5_0" onchange="ajaxUpload(this.form);" /><!-- end image label and input -->
			<br />
    </form>
	 <script type="text/javascript" src="js/upload.js"></script>
<?php } ?>
<?php
require_once('./footer.php');
?>