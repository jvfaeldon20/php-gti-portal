<select name="is_name" id="is_name" class="form-control no-border-radius is_name" required>
	<?php
		$is_name = $_GET['sales_program'];

		include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

		$stmt  = "SELECT * FROM is_name WHERE is_sales_program = '$is_name' ";
		$query = mysqli_query($db_conn, $stmt);

		while($row = mysqli_fetch_assoc($query))
			{
				echo "<option>".''."</option>";
				echo "<option>".$row['is_name']."</option>";
			}

	?>
</select>