<?php
	require_once 'validate.php';
	require 'name.php';
?>
	<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>StayflexAdmin</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="../css/linearicons.css">
			<link rel="stylesheet" href="../css/font-awesome.min.css">
			<link rel="stylesheet" href="../css/bootstrap.css">
			<link rel="stylesheet" href="../css/magnific-popup.css">
			<link rel="stylesheet" href="../css/jquery-ui.css">				
			<link rel="stylesheet" href="../css/nice-select.css">							
			<link rel="stylesheet" href="../css/animate.min.css">
			<link rel="stylesheet" href="../css/owl.carousel.css">				
			<link rel="stylesheet" href="../css/main.css">
			<link rel = "stylesheet" type = "text/css" href = "../css/bs/bootstrap.css " />
		<link rel = "stylesheet" type = "text/css" href = "../css/style.css" />
		</head>
		<body>	
			<header id="header">
				<div class="header-top">
					<div class="container">
					</div>
				</div>
				<div class="container main-menu">
					<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo" style="margin-right: auto;">
				        <a href="home.php"><img src="../img/logo.png" style="height: 50px;" alt="" title="" /></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li><a href="home.php">Home</a></li>
				          <li><a href="reserve.php">Reservations</a></li>
				          <li><a href="room.php">Rooms</a></li>
				          <li class="menu-has-children"><a href="">Welcome, <?php echo $_SESSION["username"]; ?></a>
				            <ul>
				              <li><a href="logout.php">Logout</a></li>
				            </ul>
				          </li>	
				        				          					          		          
				        </ul>
				      </nav><!-- #nav-menu-container -->					      		  
					</div>
				</div>
			</header><!-- #header -->
			