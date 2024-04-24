<?php
session_start();
include_once("../connection/conn.php");
date_default_timezone_set("Asia/Kolkata");

try {
	$email 		= trim($_POST['email']);
	$password = md5(trim($_POST['password']));

	$sql_email = "SELECT * FROM `users` WHERE `email`='".$email."'"; 
	$result_email = $conn->query($sql_email);

	$sql_login = "SELECT * FROM `users` WHERE `email`='".$email."' AND `password`='".$password."'"; 
	$result_login = $conn->query($sql_login); 

	if($result_login->num_rows > 0){ 
		$data = $result_login->fetch_assoc(); 
		$_SESSION['user_id'] = $data['id']; 
		$_SESSION['full_name'] = $data['full_name']; 
		$_SESSION['email'] = $data['email']; 

		echo 1; //login done 
	}else{ 
		echo 2; //login failed 
	}

}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>