
<?php //include 'tamp/header.php'; ?>

<?php
	include_once "classes/Customer.php";
	$cus = new Customer();
	$sendmsg = $cus->getchat();
?>
