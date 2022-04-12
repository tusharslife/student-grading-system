<?php

session_start();
	$host="localhost";
    $user="root";
    $password="";
    $db="sgs";

    $conn=mysqli_connect($host,$user,$password,$db);

    if($_GET['teacher_id'])
    {
    	$user_id=$_GET['teacher_id'];

    	$sql="DELETE FROM teacherlist WHERE id='$user_id'";

    	$result=mysqli_query($conn,$sql);

    	if($result)
    	{	
    		$_SESSION['message']='Teacher Data is Deleted Successfully';
    		header("location:view_teacher.php");
    	}
	}
?>