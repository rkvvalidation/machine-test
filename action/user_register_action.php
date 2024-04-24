<?php
include_once("../connection/conn.php");
date_default_timezone_set("Asia/Kolkata");

try {

	$full_name        = $_POST['full_name'];
	$email 			  = trim($_POST['email']);
	$password 		  = trim($_POST['password']);
	$confirm_password = trim($_POST['confirm_password']);
	$mobile_no 		  = trim($_POST['mobile_no']);
	
	$sql_email = "SELECT * FROM `users` WHERE `email`='".$email."'"; 
	$result_email = $conn->query($sql_email); 

	$sql_mobile = "SELECT * FROM `users` WHERE `mobile_no`='".$mobile_no."'"; 
	$result_mobile = $conn->query($sql_mobile); 

	if(($result_mobile->num_rows > 0)){ 
		echo 4; //mobile no already exists 
		exit;
	}

	if(($result_email->num_rows > 0)){ 
		echo 3; //email already exists 
	}else{

		if(!(empty($_FILES['image']['name']))){  
			$pname  = $_FILES['image']['name'];
			$src    = $_FILES['image']['tmp_name'];
			$s_img1 = $pname;
			$dest   = "../uploads/".$s_img1;
			move_uploaded_file($src,$dest);  
		} 

		$sql = "INSERT INTO `users`(`full_name`, `email`, `password`, `mobile_no`, `photo`) VALUES ('".$full_name."','".$email."','".md5($password)."','".$mobile_no."', '".$s_img1."')";

		if ($conn->query($sql) === TRUE) {
			echo 1;
		}else{
			echo 2;
		}
	}

}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>