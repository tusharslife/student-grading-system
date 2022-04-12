<?php
	session_start();
	session_regenerate_id();
	if ($_SESSION['otp']=$_POST['otp']) {
		header('location:f4_check.php');
	}
	else{
		echo "OTP Not match";
	}

?>