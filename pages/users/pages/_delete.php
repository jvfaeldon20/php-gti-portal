<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';
//declaration
$id = $_GET['id'];

//sql statement
$stmt = "DELETE from users  WHERE user_id = $id ";


//execution
$query = mysqli_query($db_conn,$stmt);


if($query === false)
	{
		header("Location: ../index.php?delete=false");
	}
else
	{
		header("Location: ../index.php?delete=ok");
			
	}

?>