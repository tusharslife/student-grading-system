<?php
session_start();
#error_reporting(0);
    if(!isset($_SESSION['username']))
    {
        header("location:index.php");
    }
    elseif($_SESSION['usertype']=='student')
    {
        header("location:index.php");
    }
?>
<html>
<head>
	<title>Admin panel</title>
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
      	include 'admin_sidebar.php';
      	?>
        <!------------------------------------------------------------------------------------------>
        <div class="content">
        	<h1>Admin Dashboard</h1>
            <?php 
                $host="localhost";
                $user="root";
                $password="";
                $db="sgs";

                $conn=mysqli_connect($host,$user,$password,$db);

#---------------------------------------Student Count----------------------------------------------#

                $studcount="SELECT * FROM studentlist";

                $recount=mysqli_query($conn,$studcount);

                $rows=mysqli_num_rows($recount);

                #echo "Total Students in system $rows";

#---------------------------------------Teacher Count----------------------------------------------#

                $teachcount="SELECT * FROM teacherlist";

                $recount2=mysqli_query($conn,$teachcount);

                $rows2=mysqli_num_rows($recount2);

                #echo "Total teachers in system $rows2";

             ?>
             <br><br>
             <h2>User Report</h2>
             <br>
             <table>
                <tr>
                 <th class="table_th"><h3>Teacher Count</h3></th>
                 <th class="table_th"><h3>Students Count</h3></th>
             </tr>
             <tr>
                <td class="table_td"><h4><?php echo $rows2; ?></h4></td>
                <td class="table_td"><h4><?php echo $rows; ?></h4></td>
             </tr>
             </table>
             <br>
             <h2>Assignment Report</h2><br>
             <table>
                <tr>
                    <th class="table_th">Subject Name</th>
                    <th class="table_th">Assignment</th>
                    <th class="table_th">Due Date</th>
                    <th class="table_th">View</th>
                    <th class="table_th">Response</th>
                </tr>

                <?php
                        $sql99="SELECT * FROM assignment ORDER BY subject";
                        $result99=mysqli_query($conn,$sql99);
                    while ($info99=$result99->fetch_assoc()) {
                        
                    
                ?>
                <tr>
                    <td class="table_td"><?php echo "{$info99['subject']}"; ?></td>
                    <td class="table_td"><?php echo "{$info99['assignment']}"; ?></td>
                    <td class="table_td"><?php echo "{$info99['duedate']}"; ?></td>
                    <td class="table_td"><a class='btn' href='Assignment/<?php echo "{$info99['file']}"; ?>'>View<a>
                    <!--<a class='btn' download="<?php echo "{$info99['file']}"; ?>" href='Assignment/<?php echo "{$info99['file']}"; ?>'>Download<a> -->
                    </td>
                    <td class="table_td"><?php
                            $tab="{$info99['assignment']}";
                            $tabcount="SELECT * FROM $tab";
                            $recounttab=mysqli_query($conn,$tabcount);
                            $rowstab=mysqli_num_rows($recounttab);
                            echo $rowstab; ?></td>
                </tr>
                <?php
                    }
                ?>
            </center>
            </table>
        </div>
    </body>
</html>