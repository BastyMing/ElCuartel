<?php

error_reporting(0);

require_once('../sym-app/include/cart-load.php');


	function encrypt($plainText,$key)
	{
		$secretKey = hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
	  	$openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '','cbc', '');
	  	$blockSize = mcrypt_get_block_size(MCRYPT_RIJNDAEL_128, 'cbc');
		$plainPad = pkcs5_pad($plainText, $blockSize);
	  	if (mcrypt_generic_init($openMode, $secretKey, $initVector) != -1) 
		{
		      $encryptedText = mcrypt_generic($openMode, $plainPad);
	      	      mcrypt_generic_deinit($openMode);
		      			
		} 
		return bin2hex($encryptedText);
	}

	function decrypt($encryptedText,$key)
	{
		$secretKey = hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$encryptedText=hextobin($encryptedText);
	  	$openMode = mcrypt_module_open(MCRYPT_RIJNDAEL_128, '','cbc', '');
		mcrypt_generic_init($openMode, $secretKey, $initVector);
		$decryptedText = mdecrypt_generic($openMode, $encryptedText);
		$decryptedText = rtrim($decryptedText, "\0");
	 	mcrypt_generic_deinit($openMode);
		return $decryptedText;
		
	}

	 function pkcs5_pad ($plainText, $blockSize)
	{
	    $pad = $blockSize - (strlen($plainText) % $blockSize);
	    return $plainText . str_repeat(chr($pad), $pad);
	}

	function hextobin($hexString) 
   	 { 
        	$length = strlen($hexString); 
        	$binString="";   
        	$count=0; 
        	while($count<$length) 
        	{       
        	    $subString =substr($hexString,$count,2);           
        	    $packedString = pack("H*",$subString); 
        	    if ($count==0)
		    {
				$binString=$packedString;
		    } 
        	    
		    else 
		    {
				$binString.=$packedString;
		    } 
        	    
		    $count+=2; 
        	} 
  	        return $binString; 
    	  } 
		  

	$merchant_id='';
	$working_key='';//Shared by CCAVENUES
	$access_code='';//Shared by CCAVENUES

	
  if(isset($_REQUEST['symbiotic'])){
?>
<html>
<head>
<title> Taking you to Payment Gateway</title>
</head>
<body>
<center>
<?php 
	$merchant_data='';

	$order =$_POST['order_id'];
	$total = $_REQUEST['total'];
	$this_script = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF'];
	$curr = $_REQUEST['curr'];

	$merchant_data .='merchant_id='.$merchant_id;
	$merchant_data .='&order_id='.$order;
	$merchant_data .='&amount='.$total;
	$merchant_data .='&redirect_url='.$this_script;
	$merchant_data .='&cancel_url='.$this_script;
	$merchant_data .='&currency='. $curr;
	$merchant_data .='&language=EN';
		

	$encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.

?>
<form method="post" name="redirect" action="https://secure.ccavenue.com/transaction/transaction.do?command=initiateTransaction"> 
<center><h2>Please wait, your order is being processed and you will be redirected to the Payment Gateway.</h2></center>
 <center><img src="../sym-app/images/gateway.gif"></center>
<?php
echo "<input type=hidden name=encRequest value=$encrypted_data>";
echo "<input type=hidden name=access_code value=$access_code>";
?>
</form>

</center>
<script language='javascript'>document.redirect.submit();</script>
</body>
</html>
  <?php } else{ 
    	
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$working_key);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	$order_id = $_SESSION['basket']['order_id'];
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==3)	$order_status=$information[1];
	}
	
	
	       switch($order_status){
        		case 'Success':
        			$status = '1';
        			break;
        		case 'Aborted':
        			$status = '3';
        			break;
        		default:
        			$status = '3';
					break;		
        	}
		$paymentStatus = $status;
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
	
  <?php }  ?>
  