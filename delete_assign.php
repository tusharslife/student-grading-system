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
        $fl=$_GET['file_id'];
        @unlink("assignment/".$fl);

    	$sql="DELETE FROM assignment WHERE assignment='$assign_id'";
        $sql2="DROP TABLE  $assign_id ";

    	$result=mysqli_query($conn,$sql);
        $result2=mysqli_query($conn,$sql2);

    	if($result)
    	{	
    		$_SESSION['message']='Assignment Data is Deleted Successfully';
    		header("location:assign_response.php");
    	}
	}
?>