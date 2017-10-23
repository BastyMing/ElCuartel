<?php 
$pagename = 'añadir region de envio'; 
require_once('./include/admin-load.php');

if(isset($_REQUEST['region_name'])){
	$region_name = trim($_REQUEST['region_name']);
	$region_shipping = trim($_REQUEST['region_shipping']);
	$region_zip = trim($_REQUEST['region_zip']);
	if(!empty($region_name) && !empty($region_shipping) && !empty($region_zip)){
$result =$shipping->region_add($region_name,$region_shipping,$region_zip);
}else{
$error ="All fields are required";
}

	
}
	if(!empty($shipping->msg)){
	$success = $shipping->msg;
	}
	if(!empty($shipping->error)){
	$error = $shipping->error;
	}
require_once('./header.php');

?>
<ul class="nav nav-pills"><li><a href="shipping-regions.php">REgiones de enevio</a></li></ul><hr>
<form action="shipping-region-add.php" method="post" class="form-horizontal">
<div class="form-group">
<label  class="col-md-3 control-label text-right" for="region-name">Nombre</label><div class="col-md-4">
<input class="form-control"required type="text" name="region_name" value="" id="region-name"></div></div>
<div class="form-group">
<label  class="col-md-3 control-label text-right" for="region-zip">Codigo Postal</label><div class="col-md-4">
<input class="form-control"required type="text" name="region_zip" value="" id="region-zip"></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="region-shipping">Cargos de envio (<?php echo $setting['currency_symbol'] ; ?>)</label><div class="col-md-4">
<input class="form-control"required type="text" name="region_shipping" value="" id="region-shipping">0&nbsp; usado en envio plano</div></div>
<div class="form-group"><div class="col-md-4 col-md-offset-3">
<button class="btn btn-primary">Guardar</button></div></div>
</tr>
</table>
</form>

<?php
require_once('./footer.php');

?>