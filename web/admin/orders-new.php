<?php 
$pagename = 'Nuevas Ordenes'; 
require_once('./include/admin-load.php');

$orders = $order->all('seen','no');

// Pagination
$currpage = (isset($_GET['page'])) ? $_GET['page'] : 1;
$maxres = 25;
$num = count($orders);
$pages = $num / $maxres;
$pages = ceil($pages);
$start = ( $currpage - 1 ) * $maxres ;
$last = $start + $maxres -1;
////////////////
require_once('./header.php');

?>
<ul class="nav nav-pills"><li><a href="orders.php" >Todas</a></li><li><a href="create-invoice.php" >Crear Factura</a></li></ul><hr>
<?php if(empty($orders)){
?>
<h2 align='center'>No Hay Nuevas Ordenes</h2>
<?php
}else{?>
<div class="text-center"><ul class="pagination">
<?php 
$i='';
$count= 1;
echo "<li><a href=\"orders-new.php?page=1\">Primero</a></li>";
for($i = 1 ; $i<=$pages ; $i++){
if(($currpage - $i) <=3  && ($count <= 7)){

echo "<li><a href=\"orders-new.php?page=" . $i . "\">" . $i . "</a></li>";
$count = $count+1 ;
}
elseif($currpage==$i){
echo "<li><a href=\"orders-new.php?page=" . $i . "\">" . $i . "</a></li>";
$count = $count+ 1;

}
}
echo "<li><a href=\"orders-new.php?page=" . $pages . "\">Ultimo</a></li>";
?>
</ul>
</div>
<table class="table table-hover">
<thead>
<tr>
<th>Fecha</th>
<th>ID</th>
<th>Cantidad</th>
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
<tr>
<td><?php echo $orders[$i]['date']; ?></td>
<td><?php echo $orders[$i]['id']; ?></td>
<td><?php echo $setting['currency_symbol'] . " " . $orders[$i]['net']; ?></td>
<td><?php echo $orders[$i]['gateway']; ?></td>
<td><?php echo $payment; ?></td>
<td><?php echo $status; ?></td>
<td><a href="order-details.php?id=<?php echo $orders[$i]['id']; ?>">ver / Editar</a></td>
</tr>
<?php }
}?></tbody>

</table>
<?php
}
require_once('./footer.php');

?>