<?php
$pagename = 'Direccion detallada'; 
require_once('./include/admin-load.php');
if(isset($_REQUEST['id'])){
	if(!empty($_REQUEST['id'])){
		$details = $address->details($_REQUEST['id']);
	}else{
		header("location:customers.php");
	}
	}else{
		header("location:customers.php");
	}
	if(!empty($address->msg)){
	$success = $address->msg;
	}
	if(!empty($address->error)){
	$error = $address->error;
	}
require_once('./header.php');

?><ul class="nav nav-pills"><li>
<a href="customers.php">Clientes</a></li><li><a  href="orders.php">Ordenes</a></li></ul>
<hr>
<h4>Correo cliente: <?php $x = $customer->details($details['customer']); echo $x['email'];?></h4><br>
<table ><tr><td>
Nombre:</td><td><b><?php echo $details['name'];?></b></td></tr><tr><td>
Telefono:</td><td><?php echo $details['mobile'];?></td></tr><tr><td>
Dirección:</td><td><?php echo nl2br($details['address']);?></td></tr><tr><td>
País:</td><td><?php echo $details['country'];?></td></tr><tr><td>
Codigo postal: </td><td><?php echo $details['zip'];?></td></tr>
</table>
<hr>
<?php
require_once('./footer.php');

?>