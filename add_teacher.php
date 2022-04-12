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

    if(isset($_POST['add_teacher']))
    {
       $username=$_POST['username'];
	   $firstname=$_POST['firstname'];
	   $lastname=$_POST['lastname'];
       $email=$_POST['email'];
       $phone=$_POST['phone'];
       $password=$_POST['password'];
       $usertype='teacher';

       if (strlen($phone)<=9) {
       	 $valid1="Phone Number Should be 10 Degits";

       	 $username2=$username;
   		$firstname2=$firstname;
   		$lastname2=$lastname;
   		$email2=$email;
   		$password2=$password;
       }
       elseif(strlen($phone)>=11){
       	$valid1="Phone Number Should be 10 Degits";
       	$username2=$username;
   		$firstname2=$firstname;
   		$lastname2=$lastname;
   		$email2=$email;
   		$password2=$password;
       }
       else{
       	if(filter_var($email,FILTER_VALIDATE_EMAIL))
       {

       $check="	SELECT * FROM teacherlist WHERE username='$username'";

       $check_user=mysqli_query($conn,$check);

       $row_count=mysqli_num_rows($check_user);

       if ($row_count==1) 
       {
       		echo "<script type='text/javascript'>
       	alert('Username Already Exist')
       	</script>";
       	$firstname2=$firstname;
   		$lastname2=$lastname;
   		$phone2=$phone;
   		$email2=$email;
   		$password2=$password;
       }

       else
       {


       $sql="INSERT INTO teacherlist(username,firstname,lastname,email,phone,usertype,password) 	VALUES ('$username','$firstname','$lastname','$email','$phone','$usertype','$password')";

       $result=mysqli_query($conn,$sql);

       if($result)
       {
		$to=$email;
		$subject='You Register in our system';
        $message='Username  :  '.$username.'
Firstname : '.$firstname.'
Lastname : '.$lastname.'
Email : '.$email.'
Phone : '.$phone.'
Password : '.$password.'';
        $header='From:chiragparmar1502@gmail.com';
        $m=mail($to,$subject,$message,$header);


       	echo "<script type='text/javascript'>
       	alert('Data Uploaded Successfully')
       	</script>";
       }
       else
       {
       	echo "upload failed";
       }
     }
 }
   		else{
   		$valid2="Email Should be in proper format";

   		$username2=$username;
   		$firstname2=$firstname;
   		$lastname2=$lastname;
   		$phone2=$phone;
   		$password2=$password;
   	}
   	}
   	}
    
?>
<html>
<head>
	<title>Admin panel</title>
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
			padding-top: 40px;
			padding-bottom: 50px;
			border-radius: 40px;
		}
		p{
			color: red;
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
        	<h1>Add Teacher</h1>
        	<div class="div_deg">
        		<form method="POST" action="#">
        			<br>
				<div>
        				<label>Username</label>
        				<input type="text" name="username" value="<?php echo $username2 ?>" required>
        			</div>
        			<div>
        				<label>First Name</label>
        				<input type="text" name="firstname" value="<?php echo $firstname2 ?>" required>
        			</div>
					<div>
        				<label>Last Name</label>
        				<input type="text" name="lastname" value="<?php echo $lastname2 ?>" required>
        			</div>
        			<div>
        				<label>Email</label>
        				<input type="email" name="email" value="<?php echo $email2 ?>" required>
        			</div>

        			<div>
        				<label>Phone</label>
        				<input type="tel" name="phone" pattern="[0-9]{10,10}" maxlength="10" minlength="10"	value="<?php echo $phone2 ?>" required>
        			</div>

        			<div>
        				<label>Password</label>
        				<input type="text" name="password"  value="<?php echo $password2 ?>" required>
        			</div>
        			<br>
        				<p><?php echo $valid1; echo $valid2;?></p>
        			<br>
        			<div>
        				<input type="submit" class="btn" name="add_teacher" value="Add Teacher">
        			</div>
        		</form>
        	</div>
        </center>
        </div>
    </body>
</html>