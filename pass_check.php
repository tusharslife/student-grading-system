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
		$enroll=$_POST['enroll'];
    	$email=$_POST['email'];

    	$sql="SELECT * FROM studentlist WHERE enroll='$enroll'";

    	$result1=mysqli_query($conn,$sql);
        $info=mysqli_fetch_assoc($result1);

        $email2="{$info['email']}";

        if ($email==$email2) {
              $otp= rand(100000,999999);
               /* 
                //send mail 
                $to=$email;
                $subject="Password Reset OTP";
                $txt="Hello"."{$info['firstname']}"." "."{$info['firstname']}"."your otp is $otp";
                $headers="FROM: gradingsystem@admin.com"."\r\n"."CC: chiragparmar1502@gmail.com";

                mail($to,$subject,$txt,$headers);*/

              $_SESSION['otp']=$otp;
              $_SESSION['email']=$email;

              $sql2="SELECT * FROM studentlist WHERE email='$email2'";
              $result=mysqli_query($conn,$sql2);

        	if ($result)
        	{	
        		$_SESSION['message']="OTP has been sended on your Email";
        		header("location:enter_otp.php");
        	}
        	else
        	{
        		echo "Apply Failed";
        	}
        }
    }	
?>