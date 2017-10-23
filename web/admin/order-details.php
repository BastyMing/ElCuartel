<?php 
$pagename = 'Busqueda'; 
require_once('./include/admin-load.php');
if(isset($_REQUEST['id'])){
	if(!empty($_REQUEST['id'])){
	
			$result = $order->update($_REQUEST['id'], "seen", "yes");
		$order->msg = false;
		
		if(isset($_REQUEST['action'])) { 
		if(isset($_REQUEST['status'])){
			if($_REQUEST['action'] == "paymentstatus"){
				$result = $order->update($_REQUEST['id'], "payment", $_REQUEST['status']);
			}
		if($_REQUEST['action'] == "orderstatus"){
				$result = $order->update($_REQUEST['id'], "status", $_REQUEST['status']);
			}
			}
		
			if($_REQUEST['action'] == "track"){
			$result = $order->update($_REQUEST['id'], "track", $_REQUEST['track']);
			}
			if($_REQUEST['action'] == "trackurl"){
			$result = $order->update($_REQUEST['id'], "track_url", $_REQUEST['track_url']);
			}
			if($_REQUEST['action'] == "remarks"){
			$result = $order->update($_REQUEST['id'], "remarks", $_REQUEST['remarks']);
			}
					}
			
		$details = $order->details($_REQUEST['id']);
		if(!isset($details['id'])){
		unset($details);
		}
	}else{
		header("location:orders.php");
	}
	}
	if(!empty($order->msg)){
	$success = $order->msg;
	}
	if(!empty($order->error)){
	$error = $order->error;
	}
require_once('./header.php');

?><ul class="nav nav-pills"><li>
<a href="orders.php" >Todas</a></li><li><a href="orders-new.php" >Nuevas</a></li><li><a href="create-invoice.php" >Crear Factura</a></li></ul><hr>
<?php if(!isset($details)){?>
<div class="col-md-12">
<form action="order-details.php" method="get" class="form-inline">
<h4>Obtener detalles de una orden</h4>
 <div class="form-group">
<input class="form-control"type="text" name="id" placeholder="Order ID" required></div> 
<button class="btn btn-default">Mostrar Busqueda</button>
</form></div>
<?php } else { 
switch ($details['payment']){
	case '1':
	$payment = 'Completado';
	break;
	case '2':
	$payment = 'Cancelado';
	break;
	case '3':
	$payment = 'Fallado';
	break;
	case '4':
	$payment = 'Rembolsado';
	break;
	default:
	$payment = 'Desconocido';	
}
switch ($details['status']){
	case '1':
	$status = 'Completado';
	break;
	case '2':
	$status = 'Pendiente';
	break;
	case '3':
	$status = 'Cancelado';
	break;
	case '4':
	$status = 'Enviado';
	break;
	case '5':
	$status = 'Entregado';
	break;
	case '6':
	$status = 'Devuelto';
	break;
	default:
	$status = 'Desconocido';
}

 ?>
<h2>ID: <?php echo $_REQUEST['id']; ?></h2>

<table  style="width:100%;">
<tr>
<th></th>
<th>Direccion de envio</th>
</tr>
<tr>
<td>
<b>Correo del Comprador:</b> <?php $x = $customer->details($details['customer']); echo $x['email'];?><br>
<b>Fecha:</b> <?php echo $details['date']; ?><br>
</td>
<td>
<?php
$addr_details = $address->details($details['address']);
?>
<table><tr><td>
Nombre:</td><td><?php echo $addr_details['name'];?></td></tr><tr><td>
Telefono:</td><td><?php echo $addr_details['mobile'];?></td></tr><tr><td>
Direccion:</td><td><?php echo nl2br($addr_details['address']);?></td></tr><tr><td>
Pais:</td><td><?php echo $addr_details['country'];?></td></tr><tr><td>
Codigo Postal: </td><td><?php echo $addr_details['zip'];?></td></tr>
</table>
</td>
</tr>
</table>
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>Total</th>
<th>Impuestos</th>
<th>Envio</th>
<th>Monto Neto</th>
<th>Metodo de Pago</th>
<th>Estado del pago</th>
<th>Estado de la orden</th>
</tr>
</thead>
<tbody>
<tr>
<td><?php echo $setting['currency_symbol'] ." ".$details['amount']; ?></td>
<td><?php echo $setting['currency_symbol'] ." ".$details['tax']; ?></b></td>
<td><?php echo $setting['currency_symbol'] ." ".$details['shipping']; ?></b></td>
<td><?php echo $setting['currency_symbol'] ." ".$details['net']; ?></b></td>
<td><?php echo $details['gateway'];?></td>
<td><?php echo $payment; ?></td>
<td><?php echo $status; ?></td>
</tr>
</tbody>
</table>
<h2>Ptoductos</h2>
<table class="table table-striped table-bordered">
<thead>
<tr>
<th>ID</th>
<th>Nombre</th>
<th>Opcion</th>
<th>Precio</th>
<th>Cantidad</th>
<th>Total</th>
</tr>
</thead>
<tbody><?php 
$products = json_decode($details['items'],true);
$i = 0;
foreach($products as $pro){
	$i = $i + 1;
$pro['price'] =  number_format($pro['price'], 2, '.', '');
if($pro['shipping'] != 0){
		$append = "<br><small>Shipping: ". $setting['currency_symbol'] ." " .$pro['shipping']."</small>";
		}else{
		$append ="";
		}
		if(empty($pro['opt_name'])){
	$pro['opt_name'] = "None";
	}
?>
<tr>

<td><?php echo $pro['id']; ?></td>
<td><span class="sym-img" data-show-lightbox="false" data-responsive="false" data-size="small" data-pid="<?php echo $pro['id']; ?>"></span> <?php echo $pro['name']; ?></td>
<td><?php echo $pro['opt_name']; ?></td>
<td><?php echo $setting['currency_symbol'] ." " .number_format($pro['price'], 2, '.', '')  .$append ; ?></td>
<td><?php echo $pro['count']   ; ?></td>
<td><?php echo $setting['currency_symbol'] ." " .number_format($pro['price']  * $pro['count'], 2, '.', '');?></td>
</tr>
<?php } ?>
</tbody>
</table>
<h2>ACtualizar Orden</h2>

<table class="table">
<tr>
<td><form action="order-details.php?id=<?php echo $details['id']; ?>" method="post" class="form-inline">
ID de seguimiento<br><span class="col-md-8 no-gutter">
<input class="form-control"type="text"  required value="<?php echo $details['track'];?>" name="track" placeholder="Tracking ID" >
 <input class="form-control"type="hidden" name="action" value="track"></span><span class="col-md-4 no-gutter">
<button class="btn btn-default">Actualizar</button></span>
</form></td>
<td><form action="order-details.php?id=<?php echo $details['id']; ?>" method="post" class="form-inline">
URL seguimiento<br><span class="col-md-8 no-gutter">
<input class="form-control"type="text"  class="input-small" required value="<?php echo $details['track_url'];?>" name="track_url" placeholder="Tracking URL" id="track_url">

<input class="form-control"type="hidden" name="action" value="trackurl"></span><span class="col-md-4 no-gutter">
<button class="btn btn-default">Actualizar</button></span>
</form></td>
<td><form action="order-details.php?id=<?php echo $details['id']; ?>" method="post" class="form-inline">
Observaciones<br><span class="col-md-8 no-gutter">
<textarea class="form-control" name="remarks"   class="input-small" required ><?php echo $details['remarks'];?></textarea>

<input class="form-control"type="hidden" name="action" value="remarks"></span><span class="col-md-4 no-gutter">
<button class="btn btn-default">Actualizar</button></span>
</form></td>
<td></td>
</tr>
<tr><td>
<form action="order-details.php?id=<?php echo $details['id']; ?>" method="post" class="form-inline">
Estado del pago<br><input class="form-control"type="hidden" name="action" value="paymentstatus">
<select class="form-control" name="status"  id="payment_status" class="input-small">
<option value="1" <?php $i=1; if($i == $details['payment']){ echo "selected=selected"; }?>>Completado</option>
<option value="2" <?php $i=2; if($i == $details['payment']){ echo "selected=selected"; }?>>Pendiente</option>
<option value="3" <?php $i=3; if($i == $details['payment']){ echo "selected=selected";}?>>Fallado</option>
<option value="4" <?php $i=4; if($i == $details['payment']){ echo "selected=selected"; }?>>Reembolsado</option>
</select>&nbsp;
<button class="btn btn-default">Actualizar</button>
</form></td><td>
<form action="order-details.php?id=<?php echo $details['id']; ?>" method="post"  class="form-inline">
Estado de la orden<br><input class="form-control"type="hidden" name="action" value="orderstatus">
<select class="form-control" name="status" id="order_status" class="input-small">
<option value="1" <?php $i=1; if($i == $details['status']){ echo "selected=selected"; }?>>Completado</option>
<option value="2" <?php $i=2; if($i == $details['status']){ echo "selected=selected"; }?>>Pendiente</option>
<option value="3" <?php $i=3; if($i == $details['status']){ echo "selected=selected"; }?>>Cancelado</option>
<option value="4" <?php $i=4; if($i == $details['status']){ echo "selected=selected"; }?>>Enviado</option>
<option value="5" <?php $i=5; if($i == $details['status']){ echo "selected=selected"; }?>>Entregado</option>
<option value="6" <?php $i=6; if($i == $details['status']){ echo "selected=selected"; }?>>Devuelto</option>
</select>&nbsp;
<button class="btn btn-default">Actualizar</button>
</form>
</td>
<td>
<form action="create-invoice.php"  method="get" class="form-inline">Factura<br>
<input class="form-control"type="hidden" name="id" value="<?php echo $details['id']; ?>">
<button class="btn btn-default">Crear Factura</button>
</form>
</td>
</tr>
</table>
<?php }  ?>

<?php
require_once('./footer.php');

?>