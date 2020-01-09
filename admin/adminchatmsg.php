<?php

if ($_GET['msg'])  {
	# code...

	$msg = $_REQUEST['msg'];
	$cus_id = $_REQUEST['cus_id'];
	// echo "<script>alert($msg);</script>";exit();
	include_once "../classes/Customer.php";
	$cus = new Customer();
	$sendmsg = $cus->admincreatechat($msg,$cus_id);
	//echo $sendmsg;
}else{
	echo "else";
}


?>