<?php
session_start();
error_reporting(0);
	if(!isset($_SESSION['username']))
	{
		header("location:index.php");
	}
	elseif($_SESSION['usertype']=='admin')
	{
		header("location:index.php");
	}

	$host="localhost";
	$user="root";
	$password="";
	$db="sgs";

	$conn=mysqli_connect($host,$user,$password,$db);

	$table=$_GET['exam_id'];
	$student=$_GET['student_id'];

	$sql="SELECT * FROM $table WHERE id='$student'";

	$result=mysqli_query($conn,$sql);

	$inform=mysqli_fetch_assoc($result);
	
	if(isset($_POST['update_marks']))
	{
		$enroll=$_POST['enroll'];
		$sub1=$_POST['sub1'];
		$sub2=$_POST['sub2'];
		$sub3=$_POST['sub3'];
		$sub4=$_POST['sub4'];
		$sub5=$_POST['sub5'];
		$sub6=$_POST['sub6'];
		$sub7=$_POST['sub7'];

		$sql2="UPDATE $table SET sub1='$sub1',sub2='$sub2',sub3='$sub3',sub4='$sub4',sub5='$sub5',sub6='$sub6',sub7='$sub7' WHERE enroll='$enroll'";


		$result2=mysqli_query($conn,$sql2);
		if($result2)
		{
			header("location:update_marks.php?exam_id={$table}&student_id={$student}");
		}
	}

?>
<html>
<head>
	<title>Teacher panel</title>
	<link rel="stylesheet" type="text/css" href="css/admin-style.css">
	<style type="text/css">
		label
		{
			display: inline-block;
			text-align: right;
			width: 105px;
			padding-top: 8px;
			padding-bottom: 8px;
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
		<!----------------------------------------sidebar code------------------------------------->
		<?php
		include 'teacher_sidebar.php';
		?>
		<!------------------------------------------------------------------------------------------>
</head>
	<body>

		<div class="content">
			<center>
			<h1>Update Marks</h1>
			<div class="div_deg">
			<form method="POST" action="#">
				 <div>
						<label>Enroll No.</label>
						<input type="text" name="enroll" value="<?php echo "{$inform['enroll']}";?>">
					</div>
					<div>
						<label>English</label>
						<input type="text" name="sub1" value="<?php echo "{$inform['sub1']}";?>">
					</div>
					<div>
						<label>Science</label>
						<input type="text" name="sub2" value="<?php echo "{$inform['sub2']}";?>">
					</div>
					<div>
						<label>Hindi</label>
						<input type="text" name="sub3" value="<?php echo "{$inform['sub3']}";?>">
					</div>
					<div>
						<label>Maths</label>
						<input type="text" name="sub4" value="<?php echo "{$inform['sub4']}";?>">
					</div>
					<div>
						<label>Social Science</label>
						<input type="text" name="sub5" value="<?php echo "{$inform['sub5']}";?>">
					</div>
					<div>
						<label>Sanskrit</label>
						<input type="text" name="sub6" value="<?php echo "{$inform['sub6']}";?>">
					</div>
					<div>
						<label>Computer</label>
						<input type="text" name="sub7" value="<?php echo "{$inform['sub7']}";?>">
					</div>
					<br>
					<div>
						<input type="submit" class="btn" name="update_marks" value="Update Marks">
					</div>
				</form>
			</form>
		</div>
	</center>
		</div>
	</body>
</html>