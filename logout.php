<?php
session_start();
unset($_SESSION["user_logged_in"]); 
unset($_SESSION["uid"]); 
unset($_SESSION["user_name"]); 
unset($_SESSION["user_email"]); 

// session_unset();
// session_destroy();
header('location:login.php');
?>