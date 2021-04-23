<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

$count = 0;

$stmt = "SELECT * FROM users";
$query = mysqli_query($db_conn, $stmt);

while ($row = mysqli_fetch_assoc($query)) {

	$count++;
	
	echo "<tr'>";
	echo "<td>".$count."</td>";
	echo "<td>".$row['username']."</td>";
	echo "<td>".$row['first_name']."</td>";
	echo "<td>".$row['last_name']."</td>";
	echo "<td>".$row['birthdate']."</td>";
	echo "<td>".$row['email']."</td>";
	echo "<td>".$row['role']."</td>";
	echo "<td>".$row['picture_path']."</td>";
	echo "<td>".$row['status']."</td>";

	echo "<td><a class='btn btn-info no-border-radius'  href='pages/edit.php?id=".$row['user_id']."'><span class='glyphicon glyphicon-pencil'></span></a></td>";
	
	echo "<td><a class='btn btn-danger no-border-radius'  href='pages/_delete.php?id=".$row['user_id']."' onclick='return window.confirm(\"Are you sure you want to delete this user? \")' ><span class='glyphicon glyphicon-trash'></span></a></td>";
	
	echo "</tr>";
}
?>