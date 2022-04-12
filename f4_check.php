<?php
	#error_reporting(0);

	
?>
<html>
<head>
	<title>Change Password</title>
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
			padding-top: 50px;
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
		<h1>Change Password</h1><br>
        <div class="div_deg">

		<form action="f5_check.php" method="POST">
			<div class="adm_int">
				<label class="label_text">New Password</label>
				<input class="input_deg" type="text" name="pass" required>
			</div>
			<br>
			<div class="adm_int">
				<input class="btn" type="Submit" id="submit" value="Change Password" name="apply">
			</div>
		</form>
        </center>
        </div>
    </body>
</html>