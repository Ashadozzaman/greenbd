<?php
	include_once "../classes/Customer.php";
	$cus = new Customer();
	$cus_id  = $_REQUEST['cus_id'];
	$sendmsg = $cus->admingetchat($cus_id);
?>