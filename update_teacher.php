<?php
session_start();
error_reporting(0);
    if(!isset($_SESSION['username']))
    {
        header("location:index.php");
    }
    elseif($_SESSION['usertype']=='student')
    {
        header("location:index.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="sgs";

    $conn=mysqli_connect($host,$user,$password,$db);
    
    $id=$_GET['teacher_id'];

    $sql="SELECT * FROM teacherlist WHERE id='$id'";

    $result=mysqli_query($conn,$sql);

    $info=$result->fetch_assoc();

    if(isset($_POST['save_update']))
    {
	   $firstname=$_POST['firstname'];
	   $lastname=$_POST['lastname'];
       $email=$_POST['email'];
       $phone=$_POST['phone'];
       $password=$_POST['password'];

       $query="UPDATE teacherlist SET firstname='$firstname',lastname='$lastname',email='$email',phone='$phone',password='$password' WHERE id='$id'";

       $result2=mysqli_query($conn,$query);

       if($result2)
       {
           header("location:view_teacher.php");
       }
    }

?>
<html>
<head>
	<title>Update Teacher Page</title>
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
      	include 'admin_sidebar.php';
      	?>
        <!------------------------------------------------------------------------------------------>
        <div class="content">
        	<center>
        	<h1>Update Teacher data</h1>
        	<div class="div_deg">
        		<form method="POST" action="#">
				<div>
        				<label>Username</label>
        				<input type="text" name="username" value="<?php echo "{$info['username']}";?>">
        			</div>
        			<div>
        				<label>First Name</label>
        				<input type="text" name="firstname" value="<?php echo "{$info['firstname']}";?>">
        			</div>
					<div>
        				<label>Last Name</label>
        				<input type="text" name="lastname" value="<?php echo "{$info['lastname']}";?>">
        			</div>
        			<div>
        				<label>Email</label>
        				<input type="text" name="email" value="<?php echo "{$info['email']}";?>">
        			</div>

        			<div>
        				<label>Phone</label>
        				<input type="text" name="phone" value="<?php echo "{$info['phone']}";?>">
        			</div>

        			<div>
        				<label>Password</label>
        				<input type="text" name="password" value="<?php echo "{$info['password']}";?>">
        			</div>
        			<br><br>
        			<div>
        				<input type="submit" class="btn" name="save_update" value="Update">
        			</div>
        		</form>
        	</div>
        </center>
        </div>
    </body>
</html>