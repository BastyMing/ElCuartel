<?php
$pagename = 'Añadir region de envio';
require_once('./include/admin-load.php');

	if(isset($_REQUEST['action'])){
	switch ($_REQUEST['action']){
			
		case 'update':
		if(isset($_REQUEST['product_id'])  && isset($_REQUEST['regions'])){
		$product_id = 	trim($_REQUEST['product_id']);
		$regions= json_encode($_REQUEST['regions']);
		
		$result = $product->update_regions($product_id,$regions);
		}
		break;
	}
	}

		if(isset($_REQUEST['product_id']) && !empty($_REQUEST['product_id'])){
				$details = $product->details($_REQUEST['product_id']);
		}else{
				$details = $product->details('0');
				
		}


if(!empty($product->msg)){
	$success = $product->msg;
}
	if(!empty($product->error)){
	$error = $product->error;
	}
$regions = json_decode($details['regions']);
$all_regions = $shipping->region_all();

require_once('./header.php');
?>
<ul class="nav nav-pills"><li><a href="product-edit.php?product_id=<?php echo $details['id']; ?>" >Atras</a></li><li><a href="products.php" >Todos los productos</a></li></ul>
<hr>
<?php 
if(!empty($details)){ 
?>
<table><tr>
<td><img class="img-thumbnail" src="<?php echo EXTIMGPATH; ?>medium-<?php echo $details['image']; ?>" style="margin-right:10px;" /></td>
<td><table>
<tr><td>ID: <?php echo $details['id']; ?></td></tr>
<tr><td><h4><?php echo $details['name']; ?></h4></td></tr>
<tr><td>Precio: <?php echo $setting['currency_symbol'] . $details['price']; ?></td></tr>
</table></td></tr></table><br />
<h3>Regiones de envio de productos:</h3>
<div class="row"><div class="col-md-12">
<form action="product-update-regions.php?action=update&product_id=<?php echo $details['id']; ?>" method="post" class="form-horizontal">
<div class="form-group">
<input type="checkbox" name="selectAll" id="selectToggle" > <label for="selectToggle">Seleccionar Todo / Deseleccionar Todo</label>
</div>
<div class="form-group">
<input type="hidden" name="regions[]" value="0">
<?php
foreach($all_regions as $p){
?>
<input class="RegionOptions" type="checkbox" name="regions[]" id="region-<?php echo $p['id'];?>" value="<?php echo $p['id'];?>" <?php if(in_array($p['id'],$regions)){ echo "checked='true'";
}?>> <label for="region-<?php echo $p['id'];?>"> <?php echo $p['name'];?></label><br/>
<?php
}
?>
</div>
<br/>
<div class="form-group"><div class="col-md-4">
<button class="btn btn-primary">Guardar</button></div>
</div>
</form>
</div></div>
<script type="text/JavaScript">
jQuery(function($) {
$(document).ready(function(){
	   $('#selectToggle').click(function(event) { 
        if(this.checked) {
            $('.RegionOptions').each(function() { 
                this.checked = true;                 
            });
        }else{
            $('.RegionOptions').each(function() { 
                this.checked = false;                   
            });         
        }
    });
});
});
</script>
<?php } ?>
<?php
require_once('./footer.php');
?>