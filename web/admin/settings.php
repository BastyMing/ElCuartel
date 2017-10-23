<?php 
$pagename = 'Settings'; 
require_once('./include/admin-load.php');
if($user->is_admin(USER)){
$active = 'web';
if(isset($_REQUEST['save'])){
if($_REQUEST['save'] == 'web'){
	$newsettings = array();
	$newsettings['website_url'] = $_REQUEST['website_url'];
	$newsettings['web_email'] = $_REQUEST['web_email'];
	$newsettings['invoice_email'] = $_REQUEST['invoice_email'];
	$newsettings['images'] = $_REQUEST['images'];
	$newsettings['mode'] = $_REQUEST['mode'];
	
	
	$result =$settings->update($newsettings);
	$active = 'web';
}
elseif($_REQUEST['save'] == 'payment'){
	$newsettings = array();
	$newsettings['tax'] = $_REQUEST['tax'];
	$newsettings['currency'] = $_REQUEST['currency'];
	$newsettings['currency_symbol'] = $_REQUEST['currency_symbol'];
//	$newsettings['currency_symbol_position'] = $_REQUEST['currency_symbol_position'];
	$result =$settings->update($newsettings);
$active = 'payment';
}		
elseif($_REQUEST['save'] == 'security'){
	$newsettings = array();
	$newsettings['secret'] = $_REQUEST['secret'];
	$result =$settings->update($newsettings);
$active = 'security';
}	
elseif($_REQUEST['save'] == 'social'){
	$newsettings = array();
	$newsettings['fb_app_id'] = $_REQUEST['fb_app_id'];
	$newsettings['fb_app_secret'] = $_REQUEST['fb_app_secret'];
	//$newsettings['t_app_key'] = $_REQUEST['t_app_key'];
	//$newsettings['t_app_secret'] = $_REQUEST['t_app_secret'];
	$result =$settings->update($newsettings);
$active = 'social';
}	
elseif($_REQUEST['save'] == 'captcha'){
	$newsettings = array();
	$newsettings['rc_public'] = $_REQUEST['rc_public'];
	$newsettings['rc_private'] = $_REQUEST['rc_private'];
	//$newsettings['t_app_key'] = $_REQUEST['t_app_key'];
	//$newsettings['t_app_secret'] = $_REQUEST['t_app_secret'];
	$result =$settings->update($newsettings);
$active = 'captcha';
}	
elseif($_REQUEST['save'] == 'discount'){
	$newsettings = array();
	$newsettings['fb_url'] = $_REQUEST['fb_url'];
	$newsettings['fb_dis'] = is_numeric($_REQUEST['fb_dis']) ? $_REQUEST['fb_dis'] : 0 ;
	$newsettings['g_url'] = $_REQUEST['g_url'];
	$newsettings['g_dis'] = is_numeric($_REQUEST['g_dis']) ? $_REQUEST['g_dis']: 0;
	$result =$settings->update($newsettings);
$active = 'viral';
}
}
if(isset($_REQUEST['get_exchange']) && isset($_REQUEST['exchange_from']) && isset($_REQUEST['exchange_to'])){
	echo currency($_REQUEST['exchange_from'],$_REQUEST['exchange_to'],'1');

	exit;
}	
}
$setting = $settings->get_all();
if(!empty($settings->msg)){
	$success = $settings->msg;
	}
	if(!empty($settings->error)){
	$error = $settings->error;
	}
	
require_once('./header.php');

if($user->is_admin(USER)){
	 ?>
	 
<ul class="nav nav-tabs">
  <li <?php if($active=='web'){echo "class='active'";}?>><a href="#web" data-toggle="tab">Configuracion de la Pagina</a></li>
  <!-- <li <?php if($active=='viral'){echo "class='active'";}?>><a href="#viral" data-toggle="tab">Viral Coupons</a></li> !-->
  <li <?php if($active=='payment'){echo "class='active'";}?>><a href="#payment" data-toggle="tab">Pagos</a></li>
  <li><a href="shipping.php">Envio</a></li>
</ul>
	<div class="tab-content">
  <div class="tab-pane <?php if($active=='web'){echo 'active';}?>" id="web"> 
  <h3>Configuracion de la pagina</h3>
<form class="form-horizontal" action="settings.php" method="post" id="web-settings">
<input class="form-control"type="hidden" name="save" value="web">
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">URL</label><div class="col-md-4">
<input class="form-control"type="text" name="website_url" value="<?php echo $setting['website_url'] ; ?>" id="website-url"><span class="form-tip">&nbsp;Dont add slash "/" at end of URL</span></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Correos</label><div class="col-md-4">
<input class="form-control"type="text" name="web_email" value="<?php echo $setting['web_email'] ; ?>" id="web-email"></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Correo de factura</label><div class="col-md-4">
<input class="form-control"type="text" name="invoice_email" value="<?php echo $setting['invoice_email'] ; ?>" id="invoice-email"></div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Imagenes de productos</label><div class="col-md-4">
<input class="form-control"type="text" name="images" value="<?php echo $setting['images'] ; ?>" id="images"></div></div>
<div class="form-group">
<div class="col-md-4">


</div></div>

<div class="form-group"><div class="col-md-4 col-md-offset-3">
<button class="btn btn-primary">Actualizar</button></div>
</div>


</form></div>

  <div class="tab-pane <?php if($active=='payment'){echo 'active';}?>" id="payment"> <h3>Metodos &amp; De Pago</h3>
<form class="form-horizontal" action="settings.php" method="post" id="payment-settings">
<input class="form-control"type="hidden" name="save" value="payment">

<div class="form-group">
<label class="col-md-3 control-label text-right" for="">impuesto</label><div class="col-md-4">
<input class="form-control"type="text" name="tax" value="<?php echo $setting['tax'] ; ?>" id="tax"> 0 = sin impuestos</div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Moneda</label><div class="col-md-4">
<input class="form-control"type="text" name="currency" value="<?php echo $setting['currency'] ; ?>" id="admin-curr"> </div></div>
<div class="form-group">
<label class="col-md-3 control-label text-right" for="">Simbolo moneda</label><div class="col-md-4">
<input class="form-control"type="text" name="currency_symbol" value="<?php echo $setting['currency_symbol'] ; ?>" id="admin-sym"> </div></div>
<!--
<div class="form-group"><label class="col-md-3 control-label text-right" for="">Currency Symbol Position</label><div class="col-md-4">
<select class="form-control" name="currency_symbol_position" id="admin-sym-pos">
<option value="0" <?php if($setting['currency_symbol_position'] == 0){echo "selected";}?>>Before Amount</option>
<option value="1" <?php if($setting['currency_symbol_position'] == 1){echo "selected";}?>>After Amount</option>

</select>
</div></div> !-->

<div class="form-group"><div class="col-md-4 col-md-offset-3">
<button class="btn btn-primary">Actualizar</button></div></div>


</form>
</div>


</form>
</div></div>
<?php } else {?>
<p><strong>No Estas autorizado.</strong></p>
<?php } 
require_once('./footer.php');

?>