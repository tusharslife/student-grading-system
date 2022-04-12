<?php

	$host="localhost";
    $user="root";
    $password="";
    $db="sgs";

    $email=$_POST['email'];
    $conn=mysqli_connect($host,$user,$password,$db);

    $sql="SELECT * FROM studentlist WHERE email='$email'";

    $result=mysqli_query($conn,$sql);

    if ($result->num_rows==1) {
    	$otp = rand(100000,999999);

    	$sql2="UPDATE studentlist SET otp='$otp' WHERE email='$email'";
    	$result2=mysqli_query($conn,$sql2);


        $to=$email;
        $subject='Otp for password reset';
        $message='your password reset otp is'.$otp.'.';
        $header='From:chiragparmar1502@gmail.com';
        $m=mail($to,$subject,$message,$header);
    	session_start();
    	session_regenerate_id();
    	$_SESSION['otp']=$otp;
    	$_SESSION['email']=$email1;
    	header('location:f2_check.php');
    }
    else{
    	echo "<script>alert('User Not Found.');window.location.href='forget_student.php';</script>";
    }
?>