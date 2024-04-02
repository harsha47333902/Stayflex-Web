<?php
	require_once 'connect.php';
	$time = date("H:i:s");
	$date = date("Y-m-d");
	$conn->query("UPDATE `transaction` SET `checkout_time` = '$time', `checkout` = '$date', `status` = 'Check Out' WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
	header("location:checkout.php");
?>