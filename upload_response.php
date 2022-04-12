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
    $user=$_SESSION['username'];

    $table1=$_GET['assign_id'];

    if(isset($_POST['upload']))
    {
        $date=$_POST['date'];

        $check=" SELECT * FROM $table1 WHERE enroll='$user'";

        $check_resp=mysqli_query($conn,$check);

        $row_count=mysqli_num_rows($check_resp);
        

        

        if($row_count==1)
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
            $upload_dir='responses/';
            $filePath=$upload_dir.$newName;
            move_uploaded_file($tmp_name,$filePath); 
            /*-----------------------------------------------------------------------------------------------------------*/
            $sql0="INSERT INTO $table1(enroll,submited,file)  VALUES('$user','$date','$newName')";
            
            $result2=mysqli_query($conn,$sql0);
            

            echo '<script language="javascript">';
            echo 'alert("Assignment Added Successfully")';
            echo '</script>';

        }
    }


?>
<html>
<head>
    <title>Student panel</title>
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
        include 'student_sidebar.php';
        ?>
        <!------------------------------------------------------------------------------------------>
</head>
    <body>
       
    <div class="content">
            <center>
            <h1>Upload Assignment</h1>
            <div class="div_deg">
                <form method="POST" action="#" enctype="multipart/form-data">
                    <div>
                        <label>Today's Date</label>
                        <input type="date" name="date" required>
                    </div>
                    <br>
                    <div>
                        <input type="file" name="file" required>
                    </div>
                    <br>
                    <div>
                        <input type="submit" class="btn" name="upload" value="Upload">
                    </div>
                </form>
            </div>
        </center>
        </div>
    </body>
</html>