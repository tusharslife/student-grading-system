<?php

session_start();
    $host="localhost";
    $user="root";
    $password="";
    $db="sgs";

    $conn=mysqli_connect($host,$user,$password,$db);

    if($conn===false)
    {
        die("connection error");
    }


    if (isset($_POST['apply'])) 
    {
    	$firstname=$_POST['firstname'];
		$lastname=$_POST['lastname'];
    	$email=$_POST['email'];
    	$phone=$_POST['phone'];
    	$message=$_POST['message'];

    	$sql="INSERT INTO feedback(firstname,lastname,email,phone,message) VALUES ('$firstname','$lastname','$email','$phone','$message')";

    	$result=mysqli_query($conn,$sql);

    	if ($result)
    	{	
    		$_SESSION['message']="Thank you for Your Feedback";
    		header("location:index.php");
    	}
    	else
    	{
    		echo "Apply Failed";
    	}
    }	
?>