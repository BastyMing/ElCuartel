<?php 
$pagename = 'Ordenes'; 
require_once('./include/admin-load.php');
$orders = $order->all();
// Pagination
$currpage = (isset($_GET['page'])) ? $_GET['page'] : 1;
$maxres = 50;
$num = count($orders);
$pages = $num / $maxres;
$pages = ceil($pages);
$start = ( $currpage - 1 ) * $maxres ;
$last = $start + $maxres -1;
////////////////
require_once('./header.php');

?>
<ul class="nav nav-pills"><li><a href="orders-new.php" >Nuevas</a></li><li><a href="create-invoice.php" >Crear FActura</a></li></ul><hr>
<?php if(empty($orders)){
?>
<h2 align='center'>No Hay ordenes.</h2>
<?php
}else{?>
<div class="text-center"><ul class="pagination">
<?php 
$i='';
$count= 1;
echo "<li><a href=\"orders.php?page=1\">First</a></li>";
for($i = 1 ; $i<=$pages ; $i++){
if(($currpage - $i) <=3  && ($count <= 7)){

echo "<li><a href=\"orders.php?page=" . $i . "\">" . $i . "</a></li>";
$count = $count+1 ;
}
elseif($currpage==$i){
echo "<li><a href=\"orders.php?page=" . $i . "\">" . $i . "</a></li>";
$count = $count+ 1;

}
}
echo "<li><a href=\"orders.php?page=" . $pages . "\">Last</a></li>";
?>
</ul>
</div>
<table class="table table-hover">
<thead>
<tr>
<th>Fecha</th>
<th>ID</th>
<th>Monto</th>
<th>Metodo de pago</th>
<th>Estado de pago</th>
<th>Estado de la orden</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>
<?php for($i = $start; $i <= $last; $i++) {
if (isset($orders[$i])){
switch ($orders[$i]['payment']){
	case '1':
	$payment = 'Completado';
	break;
	case '2':
	$payment = 'Pendiente';
	break;
	case '3':
	$payment = 'Fallado';
	break;
	case '4':
	$payment = 'Reembolsado';
	break;
	default:
	$role = 'Desconocido';	
}
switch ($orders[$i]['status']){
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
	$status = 'Envidiado';
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
<tr<?php if($orders[$i]['seen']=='no'){ echo " class='info'";}?>>
<td><?php echo $orders[$i]['date']; ?></td>
<td><?php echo $orders[$i]['id']; ?></td>
<td><?php echo $setting['currency_symbol'] . " " . $orders[$i]['net']; ?></td>
<td><?php echo $orders[$i]['gateway']; ?></td>
<td><?php echo $payment; ?></td>
<td><?php echo $status; ?></td>
<td><a href="order-details.php?id=<?php echo $orders[$i]['id']; ?>">Ver / Editar</a></td>
</tr>
<?php }
}?></tbody>

</table>
<div class="col-md-6">
<form action="order-details.php" method="get" class="form-inline">
<h4>Ver detalles</h4>
<span class="col-md-8 no-gutter">
<input class="form-control"type="text" name="id" placeholder="Order ID" required></span><span class="col-md-4 no-gutter">
<button class="btn btn-default">Mostrar detalles</button></span>
</form></div>
<?php
}
require_once('./footer.php');

?>