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
        $assign_name=mysqli_real_escape_string($conn,$_POST['assign_name']);

        $result=mysqli_query($conn,"SHOW TABLES LIKE '".$assign_name."'");


        $subject=$_POST['subject'];
        $date=$_POST['date'];

        if($result->num_rows==1)
        {
            echo '<script language="javascript">';
            echo 'alert("Assignment Already Exists, please try again")';
            echo '</script>';
        }
        else{
            /*---------------------------------------File Upload--------------------------------------------------------*/
            $type=$_FILES['file']['type'];
            $name=$_FILES['file']['name'];
            $tmp_name=$_FILES['file']['tmp_name'];
            $fileExtension=explode(".",$name);
            $fileExtension=end($fileExtension);
            $n1=rand(1000,10000);
            $n2=date("ymd");
            $n3=time();
            @$newName=$n1.$n2.$n3.".".$fileExtension;
            $upload_dir='assignment/';
            $filePath=$upload_dir.$newName;
            move_uploaded_file($tmp_name,$filePath); 
            /*-----------------------------------------------------------------------------------------------------------*/
           $create_assign="CREATE TABLE $assign_name(id INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,enroll INT(10),submited DATE,marks INT(10),file VARCHAR(100))";
            $sql="INSERT INTO assignment(assignment,subject,duedate,file)  VALUES('$assign_name','$subject','$date','$newName')";
            
            $result2=mysqli_query($conn,$create_assign);
            $result3=mysqli_query($conn,$sql);
            

            echo '<script language="javascript">';
            echo 'alert("Assignment Added Successfully")';
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
            width: 140px;
            padding-top: 5px;
            padding-bottom: 5px;
            font-size: 16px;
        }
        select,input[type='date']
        {
            width: 35%;
        }
        input[type='file']
        {
            width: 40%;
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
            <h1>Add Assignment</h1>
            <div class="div_deg">
                <form method="POST" action="#" enctype="multipart/form-data">
                <div>
                        <label>Assignment Name</label>
                        <input type="text" name="assign_name" required>
                    </div>
                    <br>
                    <div>
                        <label>Subject</label>
                        <select name="subject"  required>
                            <option>Select Subject</option>
                            <option>English</option>
                            <option>Science</option>
                            <option>Maths</option>
                            <option>Hindi</option>
                            <option>Social Science</option>
                            <option>Sanskrit</option>
                            <option>Computer</option>
                        </select>
                    </div>
                    <br>
                    <div>
                        <label>Due Date</label>
                        <input type="date" name="date" required>
                    </div>
                    <br>
                    <div>
                        <input type="file" name="file" required>
                    </div>
                    <br>
                    <div>
                        <input type="submit" class="btn" name="create" value="Add">
                    </div>
                </form>
            </div>
        </center>
        </div>
    </body>
</html>