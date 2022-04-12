<?php

	$host="localhost";
    $user="root";
    $password="";
    $db="sgs";

    $conn=mysqli_connect($host,$user,$password,$db);

	$assign=$_GET['assign_id'];
	$file2=$_GET['response_id'];
	if (isset($_GET['response_id'])) {

		$sql= "SELECT * FROM $assign WHERE file='$file2'";
		$filename=basename($_GET['response_id']);
		$filepath='responses/'.$filename;


		if(file_exists($filename))
		{
			header('Content-Description: '.$data['description']);
			header('Content-Type: '.$data['type']);
			header('Content-Disposition: '.$data['disposition'].'; filename="'.basename($file).'"');
			header('Expires: '.$data['expires']);
			header('Cache-Control: '.$data['cache']);
			header('Pragma: '.$data['pragma']);
			header('Content-Length: '.filesize($file));
			readfile($file);
			exit;
		}
	}
?>