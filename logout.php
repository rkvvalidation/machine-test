<?php  
	session_start(); 
	$_SESSION["user_id"] = '';  
	$_SESSION["full_name"] = '';  
	$_SESSION["email"] = '';  

    unset($_SESSION["user_id"]);  
    unset($_SESSION["full_name"]);  
    unset($_SESSION["email"]);  

    header("Location:index.php"); 
?> 