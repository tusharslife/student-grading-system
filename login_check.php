<?php
error_reporting(0);
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
        if($_SERVER["REQUEST_METHOD"]=="POST")
        {
            $uname = $_POST['username'];

            $pass = $_POST['password'];

            $sql="SELECT * FROM `login` where username='".$uname."'AND password='".$pass."' limit 1";

            $result=mysqli_query($conn,$sql);

            $row=mysqli_fetch_array($result);
            if($row["usertype"]=="student")
            {  
                $_SESSION["username"]=$uname;

                $_SESSION['usertype']="student";

                header("location:studenthome.php");
            }
            elseif($row["usertype"]=="admin")
            {
                $_SESSION["username"]=$uname;

                $_SESSION['usertype']="admin";

                header("location:adminhome.php");
            }
            else
            {   
                session_start();
                $message="username or password do not match";
                $_SESSION['loginMessage']=$message;
                header("location:login.php");
            }
        }

?>