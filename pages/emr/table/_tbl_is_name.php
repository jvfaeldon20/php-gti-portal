<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

$output             = '';
$stmt               = "SELECT * FROM is_name WHERE is_name = '%".$_GET["search"]."%' ";

$result = mysqli_query($db_conn,$stmt);

if(mysqli_num_rows($result)>0)
	{
	while($row = mysqli_fetch_array($result))
		{
			echo "<tr>";
			echo "<td>".$row['is_name']."</td>";
			echo "<td>".$row['is_email_to']."</td>";
			echo "<td>".$row['is_email_cc']."</td>";
			echo "<td>".$row['is_campaign']."</td>";
			echo "</tr>";
		}
	}
 else{
 	
 	}
?>
