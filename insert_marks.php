<?php
session_start();
error_reporting(0);
    if(!isset($_SESSION['username']))
    {
        header("location:index.php");
    }
    elseif($_SESSION['usertype']=='admin')
    {
        header("location:index.php");
    }

    $host="localhost";
    $user="root";
    $password="";
    $db="sgs";

    $conn=mysqli_connect($host,$user,$password,$db);

    $table=$_GET['exam_id'];

    #$sql="SELECT * FROM exam WHERE examname='$id'";

    #$result=mysqli_query($conn,$sql);

    if(isset($_POST['add']))
    {


        $enroll=$_POST['enroll'];
        $sub1=$_POST['sub1'];
        $sub2=$_POST['sub2'];
        $sub3=$_POST['sub3'];
        $sub4=$_POST['sub4'];
        $sub5=$_POST['sub5'];
        $sub6=$_POST['sub6'];
        $sub7=$_POST['sub7'];

        $check=" SELECT * FROM $table WHERE enroll='$enroll'";

        $check_marks=mysqli_query($conn,$check);

        $row_count=mysqli_num_rows($check_marks);
        
        if($row_count==1)
        {
            echo '<script language="javascript">';
            echo 'alert("Marks Already Exists, please try again")';
            echo '</script>';
        }
        else{

            $sql1="INSERT INTO $table (enroll,sub1,sub2,sub3,sub4,sub5,sub6,sub7)  VALUES('$enroll','$sub1','$sub2','$sub3','$sub4','$sub5','$sub6','$sub7')";
            
            $result3=mysqli_query($conn,$sql1);
            

            echo '<script language="javascript">';
            echo 'alert("Marks Added Successfully")';
            echo '</script>';

        }
    }


?>
<html>
<head>
    <title>Teacher panel</title>
    <link rel="stylesheet" type="text/css" href="css/admin-style.css">
    <style type="text/css">
        label
        {
            display: inline-block;
            text-align: right;
            width: 105px;
            padding-top: 8px;
            padding-bottom: 8px;
            font-size: 16px;
        }
        .btn
        {
            padding: 5px 10px;
            background: #fff;
            border-color: #de3163;
            border-radius: 30px;
        }
        .btn:hover{
            background: #de3163;
            color: #fff;
            border-radius: 30px;
        }
        .div_deg
        {
            background-color: #fcf4a3;
            width: 500px;
            padding-top: 70px;
            padding-bottom: 50px;
            border-radius: 40px;
        }
    </style>
        <!----------------------------------------sidebar code------------------------------------->
        <?php
        include 'teacher_sidebar.php';
        ?>
        <!------------------------------------------------------------------------------------------>
</head>
    <body>
       
    <div class="content">
            <center>
            <h1>Add Marks</h1>
            <div class="div_deg">
                <form method="POST" action="#">
                    <div>
                        <label>Enroll No.</label>
                        <input type="text" name="enroll" required>
                    </div>
                    <div>
                        <label>English</label>
                        <input type="text" name="sub1" required>
                    </div>
                    <div>
                        <label>Science</label>
                        <input type="text" name="sub2" required>
                    </div>
                    <div>
                        <label>Hindi</label>
                        <input type="text" name="sub3" required>
                    </div>
                    <div>
                        <label>Maths</label>
                        <input type="text" name="sub4" required>
                    </div>
                    <div>
                        <label>Social Science</label>
                        <input type="text" name="sub5" required>
                    </div>
                    <div>
                        <label>Sanskrit</label>
                        <input type="text" name="sub6" required>
                    </div>
                    <div>
                        <label>Computer</label>
                        <input type="text" name="sub7" required>
                    </div>
                    <br>
                    <div>
                        <input type="submit" class="btn" name="add" value="Add Marks">
                    </div>
                </form>
            </div>
        </center>
        </div>
    </body>
</html>