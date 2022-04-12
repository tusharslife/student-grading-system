<?php
error_reporting(0);
session_start();
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

    if($conn===false)
    {
        die("connection error");
    }
    $sql="SELECT * FROM feedback";

    $result=mysqli_query($conn,$sql);
?>
<html>
<head>
	<title>Admin panal</title>
	<link rel="stylesheet" type="text/css" href="css/admin-style.css">
    <style type="text/css">
        .table_td
        {
            padding: 20px;
            background-color: #fcf4a3;
            border-radius: 10px;
        }
        .table_th
        {
            padding: 20px;
            font-size: 20px;
            background-color: #de3163;
            border-radius: 10px;
        } 
    </style>
</head>
    <body>
       <?php
        include 'admin_sidebar.php';
        ?>
        <div class="content">
            <center>
        	<h1>Feedback</h1>
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
                    <th class="table_th" >First Name</th>
                    <th class="table_th" >Last Name</th>
                    <th class="table_th" >Email</th>
                    <th class="table_th" >Phone</th>
                    <th class="table_th" >Message</th>
                    <th class="table_th" >Delete</th>
                 <?php
                    while ($info=$result->fetch_assoc())
                    {    
                ?>
                <tr>
                    <td class="table_td" ><?php echo "{$info['firstname']}";  ?></td>
                    <td class="table_td" ><?php echo "{$info['lastname']}";  ?></td>
                    <td class="table_td" ><?php echo "{$info['email']}";  ?></td>
                    <td class="table_td" ><?php echo "{$info['phone']}";  ?></td>
                    <td class="table_td" ><?php echo "{$info['message']}";  ?></td>
                    <td class="table_td"><?php echo "<a class='btn' onClick=\"javascript:return confirm('Are You Sure to Delete this')\" href='delete_admission.php?student_id={$info['id']}'> Delete </a>"; ?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </center>
        </div>
    </body>
</html>