<?php
require_once('../sym-app/include/cart-load.php');
if(isset($_REQUEST['symbiotic'])){
$order_id= $_REQUEST['order_id'];
}
$paymentStatus = '2';
$order->callback($order_id,$paymentStatus);
?>

      <html>
     <head><title>Processing your Payment...</title></head>
   <body onLoad="document.forms['payment_form'].submit();">
     <center><h2>Please wait, your order is being processed.</h2></center>
	   <center><img src="../sym-app/images/gateway.gif"></center>
	<form method="post" name="payment_form"  action="<?php echo $setting['website_url'];?>/?sym-callback=1">
	<input type="hidden" name="order_id" value="<?php echo $order_id; ?>">
	</form></body></html>
      