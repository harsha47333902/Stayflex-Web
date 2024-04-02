<?php
	if(ISSET($_POST['add_room'])){
		$room_type = $_POST['room_type'];
		$price = $_POST['price'];
		$total_rooms = $_POST['count'];
		$description = $_POST['description'];

		$photo = addslashes(file_get_contents($_FILES['photo']['tmp_name']));
		$photo_name = addslashes($_FILES['photo']['name']);

		$photo_size = getimagesize($_FILES['photo']['tmp_name']);
		move_uploaded_file($_FILES['photo']['tmp_name'],"../photo/" . $_FILES['photo']['name']);
		$conn->query("INSERT INTO `room` (room_type, total, price, photo, description) VALUES('$room_type', '$total_rooms', '$price', '$photo_name','$description')") or die(mysqli_error());
		header("location:room.php");
	}
?>