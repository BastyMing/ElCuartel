<?php

$pagename = 'Detalles'; 
require_once('./include/admin-load.php');

if(isset($_REQUEST['id'])){
	if(!empty($_REQUEST['id'])){
		$details =$customer->details(trim($_REQUEST['id']));
	}else{
		header("location:customers.php");
	}
}else{
		$details = $customer->details('0');
		
	}
	if(!empty($customer->msg)){
	$success = $customer->msg;
}
	if(!empty($customer->error)){
	$error = $customert->error;
	}
	$pagename = $details['name'];
require_once('./header.php');
if(!empty($details)){ 
?>
<ul class="nav nav-pills"><li><a href="customers.php" >Compradores</a></li></ul>
<hr>
<div class="row">
<div class="col-md-3" >ID</div><div class="col-md-9">
<?php echo $details['id']; ?></div>

<div class="col-md-3" >Nombre</div><div class="col-md-9"><?php echo $details['name']; ?></div>

<div class="col-md-3" for="product-price">Telefono</div><div class="col-md-9">
<?php echo $details['mobile']; ?></div>

<div class="col-md-3" for="product-description">Correo</div><div class="col-md-9"><?php echo $details['email']; ?></div>

<div class="col-md-3" for="product-category">Direccion</div><div class="col-md-9">
<?php 
$addr = $customer->address($details['id']);
$a = 0;
foreach($addr as $ad){
$a = $a + 1;
echo "<a href=\"address-details.php?id=" . $ad['id'] . "\" class=\"addr\">Address " . $a . "</a><br>";
}
 ?>
</div>
</div>
<?php } ?>
<?php
require_once('./footer.php');
?>