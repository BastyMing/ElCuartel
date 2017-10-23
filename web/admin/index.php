<?php 

$pagename = 'Overview'; 

require_once('./include/admin-load.php');
$new_orders = $order->all('seen','no');
$setting = $settings->get_all();
require_once('./header.php');
 ?>
 <div class="row">
<div class="col-md-6">
<h3><a href="orders-new.php">nuevas ordenes <?php if($num_new > 0){echo "(".$num_new.")";}?></a></h3>
<?php if(isset($new_orders[0])){?>
<table class="table">
<thead>
<tr>
<th>Fecha</th>
<th>Id de la orden</th>
<th>Cantidad</th>
<th>Estado del pago</th>
</tr>
</thead>
<tbody>
<?php for($i =0 ; $i<5;$i++){ if(isset($new_orders[$i])){
switch ($new_orders[$i]['payment']){
	case '1':
	$payment = 'Completado';
	break;
	case '2':
	$payment = 'Pendiente';
	break;
	case '3':
	$payment = 'Fallada';
	break;
	case '4':
	$payment = 'Reembolsada';
	break;
	default:
	$role = 'Desconocido';	
}
?>
<tr>
<td><?php echo $new_orders[$i]['date'];?></td>
<td><a href="order-details.php?id=<?php echo $new_orders[$i]['id']?>"><?php echo $new_orders[$i]['id'];?></a></td>
<td><?php echo $setting['currency_symbol'] . " " . $new_orders[$i]['net']; ?></td>
<td><?php echo $payment; ?></td>
</tr>
<?php }} ?>
</tbody>
</table><?php } else{
echo "<h3 class='text-center'>No hay nuevas ordenes</h3>";
}?>
</div><div class="col-md-6">
<h3><a href="settings.php">Configuración</a></h3>
<table class="table">
<thead>
<tr>
<th>Configuración</th>
</tr>
</thead>
<tbody>
<tr><td>URL</td><td><?php echo $setting['website_url'];?></td></tr>
<tr><td>Correo del administrador</td><td><?php echo $setting['web_email'];?></td></tr>
<tr><td>Correo Factura</td><td><?php echo $setting['invoice_email'];?></td></tr>
<tr><td>Moneda</td><td><?php echo $setting['currency'] ." (". $setting['currency_symbol'];?> )</td></tr>
</tbody>
</table>

</div></div><div class="row"><div class="col-md-6">

<form action="order-details.php" method="post" class="form-inline">
    <h4>Buscar Ordenes:</h4> <div class="form-group">
<input class="form-control" type="text" name="id" placeholder="Order ID"></div>
<button class="btn btn-default">Mostrar detalles</button>
</form>

</div><div class="col-md-6">
<form action="create-invoice.php" method="post" class="form-inline"><h4>Crear Factura:</h4>
 <div class="form-group"><input class="form-control"type="text" name="id" placeholder="Order ID" >
</div> <button class="btn btn-default">Crear Factura</button>
</form>

</div>
</div>


<?php
require_once('./footer.php');

?>