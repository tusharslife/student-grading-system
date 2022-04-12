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

    $table=$_GET['assign_id'];
    $response=$_SESSION['username'];

    $sql="SELECT * FROM $table WHERE enroll='$response'";

    $result=mysqli_query($conn,$sql);

    $info=mysqli_fetch_assoc($result);

?>
<html>
<head>
	<title>Student panel</title>
	<link rel="stylesheet" type="text/css" href="css/admin-style.css">
    <style type="text/css">
		label
		{
			display: inline-block;
			text-align: right;
			width: 140px;
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
        input[type='date']
        {
            width: 35%;
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
      	include 'student_sidebar.php';
      	?>
        <!------------------------------------------------------------------------------------------>
</head>
    <body>

        <div class="content">
            <center>
        	<h1>Your Response</h1>
            <div class="div_deg">
            <form method="POST" action="#">
                 <div>
                        <label>Enroll No.</label>
                        <label><?php echo "{$info['enroll']}";?></label>
                    </div>
                    <div>
                        <label>Submited Date</label>
                        <input type="Date" name="date" value="<?php echo "{$info['submited']}";?>">
                    </div>
                    <div>
                        <label>Marks</label>
                        <input type="number" name="marks" value="<?php echo "{$info['marks']}";?>">
                    </div>
                    <br>
                    <div>
                        <a class='btn' href='responses/<?php echo "{$info['file']}"; ?>'>View<a>  
                        <a class='btn' download="<?php echo "{$info['file']}"; ?>" href='responses/<?php echo "{$info['file']}"; ?>'>Download<a>  
                    </div>
                </form>
        </div>
    </center>
        </div>
    </body>
</html>