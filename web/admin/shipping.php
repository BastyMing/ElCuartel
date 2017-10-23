<?php 
$pagename = 'Envio'; 
require_once('./include/admin-load.php');
if($user->is_admin(USER)){
if(isset($_REQUEST['save'])){
if($_REQUEST['save'] == 'shipping'){
	$newsettings = array();
	$newsettings['shipping_min_items'] = $_REQUEST['shipping_min_items'];
	$newsettings['max_order_total'] = $_REQUEST['max_order_total'];
	$newsettings['min_order_total'] = $_REQUEST['min_order_total'];
	$newsettings['free_shipping'] = $_REQUEST['free_shipping'];
	$newsettings['shipping_mode'] = $_REQUEST['shipping_mode'];
	$result =$settings->update($newsettings);
}
$setting = $settings->get_all();
}
	
}


if(!empty($settings->msg)){
	$success = $settings->msg;
	}
	if(!empty($settings->error)){
	$error = $settings->error;
	}
	
require_once('./header.php');

if($user->is_admin(USER)){
	 ?>
<ul class="nav nav-pills"><li><a href="shipping-regions.php" >REgiones</a></li></ul>
<hr>
<h3>Configuracion de Envios</h3>
<form action="shipping.php" method="post" class="form-horizontal">
<input class="form-control"type="hidden" name="save" value="shipping">

<div class="form-group">

<label class="col-md-3 control-label text-right" for="">Minimo de productos</label><div class="col-md-4">

<input class="form-control"type="text" name="shipping_min_items" value="<?php echo $setting['shipping_min_items'] ; ?>" id="min-items"></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Monto total minimo: (<?php echo $setting['currency_symbol'] ; ?>)</label><div class="col-md-4">
<input class="form-control"type="text" name="min_order_total" value="<?php echo $setting['min_order_total'] ; ?>" id="min-order"></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Monto total Maximo: (<?php echo $setting['currency_symbol'] ; ?>)</label><div class="col-md-4">
<input class="form-control"type="text" name="max_order_total" value="<?php echo $setting['max_order_total'] ; ?>" id="max-order"></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Envio gratis al comprar:(<?php echo $setting['currency_symbol'] ; ?>)</label><div class="col-md-4">
<input class="form-control"type="text" name="free_shipping" value="<?php echo $setting['free_shipping'] ; ?>" id="max-order">&nbsp; Set 0 to disable free shipping.</div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">modo de envio</label><div class="col-md-4">
<select class="form-control" name="shipping_mode">
<option value="1" <?php if($setting['shipping_mode'] == '1'){echo "selected";}?>>por producto</option>
<option value="2" <?php if($setting['shipping_mode'] == '2'){echo "selected";}?>>envio plano</option>
</select>
&nbsp;
</div></div>
<div class="form-group"></label><div class="col-md-4 col-md-offset-3"><button class="btn btn-primary">Guardar</button></div></div>
</form>

<?php } else {?>
<p><strong>No Estas Autorizado.</strong></p>
<?php } 
require_once('./footer.php');

?>