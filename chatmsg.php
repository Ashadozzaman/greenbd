
<?php //include 'tamp/header.php'; ?>

<?php

if ($_GET['msg'])  {
	# code...

	$msg = $_REQUEST['msg'];
	include_once "classes/Customer.php";
	$cus = new Customer();
	$sendmsg = $cus->createchat($msg,$email);
	// echo $sendmsg; die;
}else{
	echo "else";
}


?>
