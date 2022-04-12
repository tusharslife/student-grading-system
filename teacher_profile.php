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

    $user=$_SESSION['username'];

    $sql="SELECT * FROM teacherlist WHERE username='$user'";

    $result=mysqli_query($conn,$sql);

    $info=mysqli_fetch_assoc($result);
    
    if(isset($_POST['update_profile']))
    {
        $email=$_POST['email'];
        $phone=$_POST['phone'];
        $password=$_POST['password'];

        $sql2="UPDATE teacherlist SET email='$email',phone='$phone',password='$password' WHERE username='$user'";

        $result2=mysqli_query($conn,$sql2);
        if($result2)
        {
            header('location:teacher_profile.php');
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
		<!----------------------------------------sidebar code------------------------------------->
		<?php
      	include 'teacher_sidebar.php';
      	?>
        <!------------------------------------------------------------------------------------------>
</head>
    <body>

        <div class="content">
            <center>
        	<h1>My Profile</h1>
            <div class="div_deg">
            <form method="POST" action="#">
                <div>
                    <label>Username</label>
                    <input type="text" name="enroll" value="<?php echo "{$info['username']}"?>">
                </div>
                <div>
                    <label>First Name</label>
                    <input type="text" name="firstname" value="<?php echo "{$info['firstname']}"?>">
                </div>
                <div>
                    <label>Last Name</label>
                    <input type="text" name="lastname" value="<?php echo "{$info['lastname']}"?>">
                </div>
                <div>
                    <label>Email</label>
                    <input type="email" name="email" value="<?php echo "{$info['email']}"?>">
                </div>
                <div>
                    <label>Phone</label>
                    <input type="tel" name="phone" pattern="[0-9]{10,10}" maxlength="10" minlength="10" value="<?php echo "{$info['phone']}"?>">
                </div>
                <div>
                    <label>Password</label>
                    <input type="text" name="password" value="<?php echo "{$info['password']}"?>">
                </div>
                <br>
                <div>
                    <input type="submit" class="btn" name="update_profile" value="Update">
                </div>

            </form>
        </div>
    </center>
        </div>
    </body>
</html>