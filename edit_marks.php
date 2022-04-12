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

    $table=$_GET['exam_id'];

    $sql="SELECT * FROM $table";

    $result=mysqli_query($conn,$sql);

?>
<html>
<head>
    <title>Teacher panel</title>
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
        include 'teacher_sidebar.php';
        ?>
        <!------------------------------------------------------------------------------------------>
        <div class="content">
            <center>
            <h1>Result List</h1>

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
                    <th class="table_th">Enroll No.</th>
                    <th class="table_th">Edit Marks</th>
                    <th class="table_th">Delete Marks</th>
                </tr>
                <?php
                    while ($info=$result->fetch_assoc()) {
                        
                    
                ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['enroll']}"; ?></td>
                    <td class="table_td"><?php echo "<a class='btn' href='update_marks.php?exam_id={$table}&student_id={$info['id']}'>Edit</a>"; ?></td>
                    <td class="table_td"><?php echo "<a class='btn' onClick=\"javascript:return confirm('Are You Sure to Delete this ?')\" href='delete_marks.php?exam_id={$table}&student_id={$info['id']}'> Delete </a>"; ?></td>
                </tr>
                <?php
                    }
                ?>
            </center>
            </table>
        </div>
    </body>
</html>
