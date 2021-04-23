<?php
session_start();

include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

//$stmt = "SELECT * FROM users WHERE username = '".$_POST['username']."' AND password =PASSWORD('".$_POST['pass']."') " ;
$stmt = "SELECT *
          FROM users 
        WHERE username = '".$_POST['username']."' AND password = PASSWORD('".$_POST['pass']."')";

$query = $db_conn -> query($stmt);

if (mysqli_num_rows($query)>0)
	{
		if ($row = $query -> fetch_assoc()){
			setcookie('username',$row['first_name'].' '.$row['last_name'], 0, '/gti_portal');
			setcookie('role',$row['role'], 0, '/gti_portal');
			setcookie('first_name',$row['first_name'], 0, '/gti_portal');
			setcookie('last_name',$row['last_name'], 0, '/gti_portal');
			setcookie('picture_path',$row['picture_path'], 0, '/gti_portal');
			setcookie('user_id',$row['user_id'], 0, '/gti_portal');
			setcookie('role',$row['role'], 0, '/gti_portal');
			setcookie('birthdate',$row['birthdate'], 0, '/gti_portal');
			//cookie name, cookie value, cookie duration, cookie browser

			 if($row['role'] == 'WELLNESS')
			 	{
					header("location:pages/main.php");
				}
			 elseif($row['role'] == 'ADMIN')
			 	{
			 		header("location:pages/main.php");
			 	}
			 elseif($row['role'] == 'HR')
			 	{
			 		header("location:pages/main.php");
			 	}
			 elseif($row['role'] == 'HEALTH STOP')
			 	{
			 		header("location:pages/main.php");
			 	}
			 elseif($row['role'] == 'DOCTOR')
			 	{
			 		header("location:pages/main.php");
			 	}
			 else
				{
					header("location: login.php?login=fail");
				}
		}

	}
else 
	{
			header("location: login.php?login=fail");
	}

?>