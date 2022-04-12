<?php

session_start();
	$host="localhost";
    $user="root";
    $password="";
    $db="sgs";

    $conn=mysqli_connect($host,$user,$password,$db);

    if($_GET['student_id'])
    {
    	$user_id=$_GET['student_id'];

    	$sql="DELETE FROM feedback WHERE id='$user_id'";

    	$result=mysqli_query($conn,$sql);

    	if($result)
    	{	
    		$_SESSION['message']='Feedback Data is Deleted Successfully';
    		header("location:feedback.php");
    	}
	}
?>