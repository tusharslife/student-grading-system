<?php
	#error_reporting(0);
	session_start();
	session_destroy();

	$host="localhost";
    $user="root";
    $password="";
    $db="sgs";

    $conn=mysqli_connect($host,$user,$password,$db);

    $otp2=$_SESSION['otp'];
	if (isset($_POST['apply2'])) {

    	$otp=$_POST['otp1'];

		if ($otp=$otp2) {
				$pass=$_POST['pass1'];

			$sql="UPDATE studentlist SET password='$pass' WHERE otp='$otp'";
			$res=mysqli_query($conn,$sql);

			if($res) {
				
			echo '<script language="javascript">';
            echo 'alert("Password changed successfully")';
            echo '</script>';
			header("location:student_login.php");
			}
		
		}
		else{
			echo '<script language="javascript">';
            echo 'alert("OTP Not Matched")';
            echo '</script>';
		}
	}
	else{
		
		#header("location:change_student_pass.php");
	}
?>
<html>
<head>
	<title>Enter OTP</title>
	<link rel="stylesheet" type="text/css" href="css/admin-style.css">
	<style type="text/css">
		label
		{
			display: inline-block;
			text-align: right;
			width: 100px;
			padding-top: 10px;
			padding-bottom: 10px;
			font-size: 16px;
		}
		.btn
		{
			padding: 5px 10px;
			background: #fff;
			border-color: #de3163;
			border-radius: 30px;
		}
		.btn:hover{
			background: #de3163;
			color: #fff;
			border-radius: 30px;
		}
		.div_deg
		{
			background-color: #fcf4a3;
			width: 500px;
			padding-top: 70px;
			padding-bottom: 50px;
			border-radius: 40px;
		}
	</style>
</head>
    <body>
    	<!----------------------------------------sidebar code------------------------------------->
      	<?php
      	#include 'index_sidebar.php';
      	?>
        <!------------------------------------------------------------------------------------------>
        <div class="content">
		<center>
			<br><br>
		<h1>Enter OTP</h1><br>
        <div class="div_deg">
		<form action="#" method="POST">
			<div class="adm_int">
				<label class="label_text">Enter OTP</label>
				<input class="input_deg" type="number" name="otp1" value="<?php $otp2?>">
			</div>
			<div class="adm_int">
				<label class="label_text">New Password</label>
				<input class="input_deg" type="text" name="pass1" required>
			</div>
            
			<div class="adm_int">
				<input class="btn" type="Submit" id="submit" value="Submit" name="apply2">
			</div>
		</form>
        </center>
        </div>
    </body>
</html>
