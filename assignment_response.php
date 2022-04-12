<?php
error_reporting(0);
session_start();
    if(!isset($_SESSION['username']))
    {
        header("location:login.php");
    }
    elseif($_SESSION['usertype']=='admin')
    {
        header("location:login.php");
    }
    $host="localhost";
    $user="root";
    $password="";
    $db="sgs";

    $conn=mysqli_connect($host,$user,$password,$db);

    $sql="SELECT * FROM assignment ORDER BY duedate";

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
            <h1>Assignment Details</h1>

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
                    <th class="table_th">Subject Name</th>
                    <th class="table_th">Assignment</th>
                    <th class="table_th">Due Date</th>
                    <th class="table_th">View/Download</th>
                    <th class="table_th">Your Response</th>
                    <th class="table_th">Upload</th>
                 <!--   <th class="table_th">Delete</th>-->
                </tr>
                <?php
                    while ($info=$result->fetch_assoc()) {
                        
                    
                ?>
                <tr>
                    <td class="table_td"><?php echo "{$info['subject']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['assignment']}"; ?></td>
                    <td class="table_td"><?php echo "{$info['duedate']}"; ?></td>
                    <td class="table_td"><a class='btn' href='Assignment/<?php echo "{$info['file']}"; ?>'>View<a>
                    <a class='btn' download="<?php echo "{$info['file']}"; ?>" href='Assignment/<?php echo "{$info['file']}"; ?>'>Download<a> 
                    </td>
                    <td class="table_td"><?php echo "<a class='btn' href='your_response.php?assign_id={$info['assignment']}'>Your Response</a>"; ?></td>
                    <td class="table_td"><?php echo "<a class='btn' href='upload_response.php?assign_id={$info['assignment']}'>Upload</a>"; ?></td>
                    <!--<td class="table_td"><?php #echo "<a class='btn' onClick=\"javascript:return confirm('Are You Sure to Delete this ?')\" href='remove_response.php?assign_id={$info['assignment']}&response_id={$info['file']}'> Delete </a>"; ?></td>-->
                </tr>
                <?php
                    }
                ?>
            </center>
        	</table>
        </div>
    </body>
</html>