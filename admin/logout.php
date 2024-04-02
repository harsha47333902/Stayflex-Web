<?php
	session_start();
	unset($_SESSION['admin_id']);
	unset($_SESSION['logged_in']);
	unset($_SESSION['username']);


	header("location:index.php");
?>