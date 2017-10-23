<?php 


	function sym_filter($array){
		$temp = array();
		if(is_array($array)){
			foreach($array as $key => $value){
				if(!is_array($value)){
					$value = htmlspecialchars($value , ENT_QUOTES | ENT_HTML5,UTF-8);
					$temp[$key] = $value;
				}else{
					$temp[$key] = sym_filter($value);
				}
			}
		}
		return $temp;
	}
	/*
	$test = array(array(array('hi','hello'),array('hi','hello')),array(array('hi</div>','hello'),array('hi','hello')));
	$test = sym_filter($test);
	print_r($test);exit;
	*/

if($_GET){
$_GET = sym_filter($_GET);
}

if($_POST){
$_POST = sym_filter($_POST);
}

if($_REQUEST){
$_REQUEST = sym_filter($_REQUEST);
}

?>