<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

//decalration
$id 			= $_POST['user_id'];
$username 		= $_POST['username'];
$first_name 	= $_POST['first_name'];
$last_name  	= $_POST['last_name'];
$birthdate  	= $_POST['birthdate'];
$email 			= $_POST['email'];
$role	 		= $_POST['role'];
$picture_path 	= $_POST['picture_path'];
$status 		= $_POST['status'];

//sql statement
$stmt = "UPDATE users 
	       SET username     = '$username'
	       	  ,first_name   = '$first_name'
	          ,last_name    = '$last_name'
	          ,birthdate    = '$birthdate'
	          ,email        = '$email' 
	          ,role 	    = '$role' 
	          ,picture_path = '$picture_path' 
	          ,status       = '$status' 
	     WHERE user_id      =  $id ";

//execution
$query = mysqli_query($db_conn,$stmt);


if ($query === false)
	{
		header("Location: ../index.php?update=false");
	}

else
	{
		header("Location: ../index.php?update=ok");
			
	}
?>