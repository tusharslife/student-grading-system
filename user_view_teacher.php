<?php
error_reporting(0);
session_start();
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

    $sql="SELECT * FROM teacherlist ORDER BY firstname";

    $result=mysqli_query($conn,$sql);

?>
<html>
<head>
	<title>Teacher panel</title>
	<link rel="stylesheet" type="text/css" href="css/admin-style.css">
	<style type="text/css">
		table
		{
			border-radius: 10px;
		}
		.table_th
		{
			padding: 20px;
			font-size: 20px;
			background-color: #de3163;
			border-radius: 10px;
		}

		.table_td
		{
			padding: 20px;
			background-color: #fcf4a3;
			border-radius: 10px;
		}
	</style>
</head>
    <body>
    	<!----------------------------------------sidebar code------------------------------------->
      	<?php
      	include 'teacher_sidebar.php';
      	?>
        <!------------------------------------------------------------------------------------------>
        <div class="content">
        	<center>
        	<h1>Teacher List</h1>

        	<?php
        		if($_SESSION['message'])
        		{
        			echo $_SESSION['message'];
        		}

        		unset($_SESSION['message']);
        	?>

        	<br>
        	<table>
        		<tr>
					<th class="table_th">First Name</th>
					<th class="table_th">Last Name</th>
        			<th class="table_th">Phone</th>
        			<th class="table_th">Email</th>
        		</tr>
        		<?php
        			while ($info=$result->fetch_assoc()) {
        				
        			
        		?>
        		<tr>
					<td class="table_td"><?php echo "{$info['firstname']}"; ?></td>
					<td class="table_td"><?php echo "{$info['lastname']}"; ?></td>
        			<td class="table_td"><?php echo "{$info['phone']}"; ?></td>
        			<td class="table_td"><?php echo "{$info['email']}"; ?></td>
        		</tr>
        		<?php
        			}
        		?>
        	</center>
        	</table>
        </div>
    </body>
</html>