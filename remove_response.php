<?php

session_start();
	$host="localhost";
    $user="root";
    $password="";
    $db="sgs";

    $conn=mysqli_connect($host,$user,$password,$db);

    if($_GET['assign_id'])
    {
    	$assign_id=$_GET['assign_id'];
        $fl=$_GET['response_id'];
        @unlink("responses/".$fl);

    	$sql="DELETE FROM $assign_id WHERE file='$fl'";

    	$result=mysqli_query($conn,$sql);

    	if($result)
    	{	
    		$_SESSION['message']='Response  is Deleted Successfully';
    		header("location:assignment_response.php");
    	}
	}
?>