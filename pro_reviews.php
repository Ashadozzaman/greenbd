<?php
session_start();
	include 'classes/product.php';
	$pro = new Product();
	$insRating = $pro->insRatingByAjx($_POST);
	echo $insRating; die;
	// if ($insRating) {
	// 	$status = 'ok';
	// }else{
	// 	$status = 'err';
	// }
	// echo $status; die();

?>