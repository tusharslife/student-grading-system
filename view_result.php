<?php
error_reporting(0);
session_start();
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

    $sql="SELECT * FROM exam ORDER BY year DESC";

    $result=mysqli_query($conn,$sql);

?>
<html>
<head>
    <title>Student panel</title>
    <link rel="stylesheet" type="text/css" href="css/admin-style.css">
    <style type="text/css">
        table
        {
            border-radius: 10px;
        }
        .table_th
        {
            padding: 20px;
            font-size: 20px;
            background-color: #de3163;
            border-radius: 10px;
        }

        .table_td
        {
            padding: 20px;
            background-color: #fcf4a3;
            border-radius: 10px;
        }
    </style>
</head>
    <body>
        <!----------------------------------------sidebar code------------------------------------->
        <?php
        include 'student_sidebar.php';
        ?>
        <!------------------------------------------------------------------------------------------>
        <div class="content">
            <center>
            <h1>Exam List</h1>

            <?php
                if($_SESSION['message'])
                {
                    echo $_SESSION['message'];
                }

                unset($_SESSION['message']);
            ?>

            <br>
            <table >
                <tr>
                    <th class="table_th">Exam Name</th>
                    <th class="table_th">Exam Year</th>
                    <th class="table_th">Exam Type</th>
                    <th class="table_th">View Marks</th>
                </tr>
                <?php
                    while ($info=$result->fetch_assoc()) {  
                ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['examname']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['year']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['type']}"; ?></td>
                    <td class="table_td"><?php echo "<a class='btn' href='view_marks.php?exam_id={$info['examname']}'>View</a>"; ?></td>
                </tr>
                <?php
                    }
                ?>
            </center>
            </table>
        </div>
    </body>
</html>
