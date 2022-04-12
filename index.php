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
?><!DOCTYPE html>
<html>
<head>
	<title>Student grading system</title>
	<link rel="stylesheet" type="text/css" href="css/index-style.css">
	<style type="text/css">
		img{
			width: 50%;
			float: center;
		}
	</style>
	
</head>
<body>
	<section>
	<header>
		<div class="logo">
		<a href="">
			Student grading system</a>
			</div>
			<div class="toggle"></div>
		<ul class="navigation">
			
			<li><a href="login.php">Admin login</a></li>
			<li><a href="student_login.php">Student login</a></li>
			<li><a href="teacher_login.php">Teacher login</a></li>
			<li><a href="feedback_form.php">Feedback</a></li>
		</ul>
	</header>
	</section><br>
	<center>
	<div class="text">
		<h1>Welcome to Student Grading System</h1><br><br>
		<img src="images/desk.jpg">
	</div>
	</center>
</body>
</html>