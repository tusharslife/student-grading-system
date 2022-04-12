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

    if(isset($_POST['create']))
    {
        $table_name=mysqli_real_escape_string($conn,$_POST['table_name']);

        $result=mysqli_query($conn,"SHOW TABLES LIKE '".$table_name."'");

        $year=$_POST['exam_year'];
        $type=$_POST['exam_type'];



        if($result->num_rows==1)
        {
            echo '<script language="javascript">';
            echo 'alert("Exam Already Exists, please try again")';
            echo '</script>';
        }
        else{
            $create_table="CREATE TABLE $table_name (id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,enroll INT(10),sub1 INT(10),sub2 INT(10),sub3 INT(10),sub4 INT(10),sub5 INT(10),sub6 INT(10),sub7 INT(10))";
            $sql="INSERT INTO exam(examname,year,type)  VALUES('$table_name','$year','$type')";
            
            $result2=mysqli_query($conn,$create_table);
            $result3=mysqli_query($conn,$sql);
            

            echo '<script language="javascript">';
            echo 'alert("Exam Created Successfully")';
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
            width: 100px;
            padding-top: 10px;
            padding-bottom: 10px;
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
            <h1>Add Exam</h1>
            <div class="div_deg">
                <form method="POST" action="#">
                <div>
                        <label>Exam Name</label>
                        <input type="text" name="table_name" required>
                    </div>
                    <br>
                    <div>
                        <label>Exam Year</label>
                        <input type="text" name="exam_year" required>
                    </div>
                    <br>
                    <div>
                        <label>Exam Type</label>
                        <input type="text" name="exam_type" required>
                    </div>
                    <br>
                    <div>
                        <input type="submit" class="btn" name="create" value="Create Exam">
                    </div>
                </form>
            </div>
        </center>
        </div>
    </body>
</html>