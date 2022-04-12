<?php
	error_reporting(0);
	session_start();
	session_destroy();

	if($_SESSION['message'])
	{
		$message=$_SESSION['message'];
		echo "<script type='text/javascript'>
		alert('$message')
		</script>";
	}
?>
<html>
<head>
	<title>Feedback Form</title>
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
      	include 'index_sidebar.php';
      	?>
        <!------------------------------------------------------------------------------------------>
        <div class="content">
		<center>
			<br><br>
		<h1>Feedback Form</h1><br>
        <div class="div_deg">

		<form action="data_check.php" method="POST">
			<div class="adm_int">
				<label class="label_text">First Name</label>
				<input class="input_deg" type="text" name="firstname" required>
			</div>
            <div class="adm_int">
				<label class="label_text">Last Name</label>
				<input class="input_deg" type="text" name="lastname" required>
			</div>
			<div class="adm_int">
				<label class="label_text">Email</label>
				<input class="input_deg" type="text" name="email" required>
			</div>
			<div class="adm_int">
				<label class="label_text">Phone</label>
				<input class="input_deg" type="text" name="phone" required>
			</div>
			<div class="adm_int">
				<label class="label_text">Message</label>
				<textarea class="label_text"name="message" required></textarea>
			</div>
			<div class="adm_int">
				<input class="btn" type="Submit" id="submit" value="Apply" name="apply">
			</div>
		</form>
        </center>
        </div>
    </body>
</html>