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
    $student=$_SESSION['username'];

    $sql="SELECT * FROM $table WHERE enroll='$student'";

    $result=mysqli_query($conn,$sql);

    $info=mysqli_fetch_assoc($result);

    $sql2="SELECT * FROM studentlist WHERE enroll='$student'";

    $result2=mysqli_query($conn,$sql2);

    $info2=mysqli_fetch_assoc($result2);

    function grade()
    {
        global $temp,$pass,$grade;
        if (($temp>=90) && ($temp<=100)) {
        $pass="Pass";
        $grade="A+";
        }
        elseif(($temp>=80) && ($temp<=89)){
            $pass="Pass";
            $grade="A";
        }
        elseif(($temp>=70) && ($temp<=79)){
            $pass="Pass";
            $grade="B+";
        }
        elseif(($temp>=60) && ($temp<=69)){
            $pass="Pass";
            $grade="B";
        }
        elseif(($temp>=50) && ($temp<=59)){
            $pass="Pass";
            $grade="C";
        }
        elseif(($temp<50) && ($temp>=40)){
            $pass="Pass";
            $grade="P";
        }
        elseif($temp<40){
            $pass="Fail";
            $grade="F";
        }
        elseif($temp="0"){
            $pass="";
            $grade="";
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
            width: 105px;
            /*padding-top: 8px;*/
            padding-bottom: 8px;
            font-size: 16px;
        }
        .lab1{
            width: 285px;
            text-align: left;

        }
        .lab{
            width: 200px;
            text-align: left;

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
            <h1>Result</h1>
            <div class="div_deg">
            <form method="POST" action="#">
                <label class="lab1">Enroll :<?php echo "{$info2['enroll']}";?> </label><br>
                <label class="lab1">Name :<?php echo "{$info2['firstname']}"." {$info2['lastname']}";?> </label>
        <table border>
            <tr>
                <th>Subject</th>
                <th>Marks</th>
                <th>Grade</th>
                <th>Remark</th>
            </tr>
            <tr>
                <td>English</td>
                <td><?php echo "{$info['sub1']}";?></td>
                <td><?php $temp="{$info['sub1']}"; grade($temp); echo $grade;?></td>
                <td><?php $temp="{$info['sub1']}"; grade($temp); echo $pass;?></td>
            </tr>
            <tr>
                <td>Science</td>
                <td><?php echo "{$info['sub2']}";?></td>
                <td><?php $temp="{$info['sub2']}"; grade($temp); echo $grade;?></td>
                <td><?php $temp="{$info['sub3']}"; grade($temp); echo $pass;?></td>
            </tr>
            <tr>
                <td>Hindi</td>
                <td><?php echo "{$info['sub3']}";?></td>
                <td><?php $temp="{$info['sub3']}"; grade($temp); echo $grade;?></td>
                <td><?php $temp="{$info['sub3']}"; grade($temp); echo $pass;?></td>
            </tr>
            <tr>
                <td>Maths</td>
                <td><?php echo "{$info['sub4']}";?></td>
                <td><?php $temp="{$info['sub4']}"; grade($temp); echo $grade;?></td>
                <td><?php $temp="{$info['sub4']}"; grade($temp); echo $pass;?></td>
            </tr>
            <tr>
                <td>Social Science</td>
                <td><?php echo "{$info['sub5']}";?></td>
                <td><?php $temp="{$info['sub5']}"; grade($temp); echo $grade;?></td>
                <td><?php $temp="{$info['sub5']}"; grade($temp); echo $pass;?></td>
            </tr>
            <tr>
                <td>Sanskrit</td>
                <td><?php echo "{$info['sub6']}";?></td>
                <td><?php $temp="{$info['sub6']}"; grade($temp); echo $grade;?></td>
                <td><?php $temp="{$info['sub6']}"; grade($temp); echo $pass;?></td>
            </tr>
            <tr>
                <td>Computer</td>
                <td><?php echo "{$info['sub7']}";?></td>
                <td><?php $temp="{$info['sub7']}"; grade($temp); echo $grade;?></td>
                <td><?php $temp="{$info['sub7']}"; grade($temp); echo $pass;?></td>
            </tr>
        </table>
        <br>
        <label class="lab">Total : <?php $total="{$info['sub1']}"+"{$info['sub2']}"+"{$info['sub3']}"+"{$info['sub4']}"+"{$info['sub5']}"+"{$info['sub6']}"+"{$info['sub7']}"; echo $total; ?></label><br>

        <label class="lab">Percentage : <?php $pr=$total/7; $pr=number_format((float)$pr,2,'.',''); echo $pr; ?>%</label>

        </div>
        </center>
        </div>
    </body>
</html>