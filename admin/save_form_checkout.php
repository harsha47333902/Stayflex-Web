<?php
	require_once 'connect.php';
	$time = date("H:i:s");
	$date = date("Y-m-d");
	if(ISSET($_POST['add_form'])){
		$room_no = $_POST['room_no'];
		$days = $_POST['days'];
		$query = $conn->query("SELECT * FROM `transaction` WHERE `room_no` = '$room_no' && `status` = 'Check Out'") or die(mysqli_error());
		$row = $query->num_rows;
		$time = date("H:i:s");
		// if($row > 0){
		// 	echo "<script>alert('Room not available')</script>";
		// }else{
			$query2 = $conn->query("SELECT * FROM `transaction` NATURAL JOIN `guest` NATURAL JOIN `room` WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
			$fetch2 = $query2->fetch_array();
			$total = $fetch2['price'] * $days;
		
			$total3 = $total;
			$checkout = date("Y-m-d", strtotime($fetch['checkin']."+".$days."DAYS"));
			

			$conn->query("UPDATE `transaction` SET `room_no` = '$room_no', `days` = '$days', `status` = 'Check Out', `checkout` = '$date', `checkout_time` ='$time', `bill` = '$total3' WHERE `transaction_id` = '$_REQUEST[transaction_id]'") or die(mysqli_error());
			header("location:checkout.php");
		//}
	}
?>