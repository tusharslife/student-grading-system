<?php

session_start();
	$host="localhost";
    $user="root";
    $password="";
    $db="sgs";

    $conn=mysqli_connect($host,$user,$password,$db);

    if($_GET['exam_id'])
    {
    	$table=$_GET['exam_id'];
        $student_id=$_GET['student_id'];

    	$sql="DELETE FROM $table WHERE id='$student_id'";

    	$result=mysqli_query($conn,$sql);

    	if($result)
    	{	
    		$_SESSION['message']='Student Marks is Deleted Successfully';
    		header("location:edit_marks.php?&exam_id={$table}");
    	}
	}
?>