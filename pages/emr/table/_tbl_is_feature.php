	<?php
		$is_name = $_GET['is_name'];

		include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

		$stmt  = "SELECT * FROM is_name WHERE is_name = '$is_name' ";
		$query = mysqli_query($db_conn, $stmt);

		while($row = mysqli_fetch_assoc($query))
			{
				echo "<input type='hidden' name='is_email_to' value='".$row['is_email_to']."'/>";
				echo "<input type='hidden' name='is_email_cc' value='".$row['is_email_cc']."'/>";
				echo "<input type='hidden' name='is_campaign' value='".$row['is_campaign']."'/>";
			}

	?>