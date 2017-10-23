<?php
require_once('../sym-app/include/cart-load.php');
$paypal_email = 'concept@concept8.in'; // Set Your Paypal Email HERE
$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
if(isset($_REQUEST['symbiotic'])){
$order_id= $_REQUEST['order_id'];
$amount = $_REQUEST['total'];
$curr = $_REQUEST['curr'];
}
if (empty($_GET['action'])) $_GET['action'] = 'process';  

switch ($_GET['action']) {
    
   case 'process':    ?>
   
<html>
<head>
<body onLoad="document.forms['paypal_form'].submit();">
<title>Processing Order...</title></head>
<center><h2>Please wait, your order is being processed and you will be redirected to the paypal website.</h2></center>
<center><img src="../symbiotic/images/gateway.gif"></center><form method="post" name="paypal_form" action="https://www.paypal.com/cgi-bin/webscr">
<input type="hidden" name="rm" value="2"/>
<input type="hidden" name="cmd" value="_xclick"/>
<input type="hidden" name="business" value="<?php echo $paypal_email; ?>"/>
<input type="hidden" name="return" value="<?php echo $this_script; ?>?action=success"/>
<input type="hidden" name="cancel_return" value="<?php echo $this_script; ?>?action=cancel"/>
<input type="hidden" name="item_name" value="Order No <?php echo $order_id; ?> in shopping cart"/>
<input type="hidden" name="amount" value="<?php echo $amount; ?>"/>
<input type="hidden" name="currency_code" value="<?php echo $curr; ?>"/>
<center><br/><br/>If you are not automatically redirected to Paypal within 5 seconds...<br/><br/>
<input type="submit" value="Click Here"></center></form></body></html>
<?php
  break;
      
   case 'success':      // Order was successful...
   
   
 
if(isset($_SESSION['basket']['order_id'])){
$order_id = $_SESSION['basket']['order_id'];
}else{
$order_id = 0;
$_SESSION['basket']['order_id'] = $order_id;
}


$checksum = $_SESSION['basket']['security'];

$checksum2 = $_SESSION['basket']['security2'];

switch ($_POST['payment_status']){
	case 'Completed':
	$payment = '1';
	break;
	case 'Pending':
	$payment = '2';
	break;
	case 'Failed':
	$payment = '3';
	break;
	default:
	$payment = '3';	
}
$paymentStatus = $payment;
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
      
      
      <?php
      
      break;
      
   case 'cancel':       // Order was canceled...

      if(isset($_SESSION['basket']['order_id'])){
$order_id = $_SESSION['basket']['order_id'];
}else{
$order_id = 0;
$_SESSION['basket']['order_id'] = $order_id;
}
$paymentStatus = '3';
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
      
      
      <?php
      break;
      
 }     
 ?>