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

    $sql="SELECT * FROM studentlist WHERE enroll='$user'";

    $result=mysqli_query($conn,$sql);

    $info=mysqli_fetch_assoc($result);


?>
<html>
<head>
	<title>Student panel</title>
	<link rel="stylesheet" type="text/css" href="css/admin-style.css">
		<!----------------------------------------sidebar code------------------------------------->
		<?php
      	include 'student_sidebar.php';
      	?>
        <!------------------------------------------------------------------------------------------>
</head>
    <body>
       
        <div class="content">
            <h1>Welcome <?php echo "{$info['firstname']}"; echo " "; echo"{$info['lastname']}";?></h1>
            <br><br>
            <h3>Email : <?php echo "{$info['email']}";?></h3><br>
            <h3>Phone : <?php echo "{$info['phone']}";?></h3>
            <br>
            
        	
        </div>
    </body>
</html>