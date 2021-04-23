	<?php
		$member_no = $_GET['member_no'];

		include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

		$stmt  = "SELECT * FROM record WHERE member_no = '$member_no' ORDER BY record_id DESC LIMIT 1 ";
		$query = mysqli_query($db_conn, $stmt);

		while($row = mysqli_fetch_assoc($query))
			{
				//vitals
				echo "<input type='hidden' class='post_blood_type' value='".$row['blood_type']."'/>";
				echo "<input type='hidden' class='post_rh' value='".$row['rh']."'/>";
				echo "<input type='hidden' class='post_height' value='".$row['height']."'/>";
				echo "<input type='hidden' class='post_weight' value='".$row['weight']."'/>";
				echo "<input type='hidden' class='post_blood_pressure' value='".$row['blood_pressure']."'/>";
				echo "<input type='hidden' class='post_pulse_rate' value='".$row['pulse_rate']."'/>";
				echo "<input type='hidden' class='post_respiratory_rate' value='".$row['respiratory_rate']."'/>";
				echo "<input type='hidden' class='post_temperature' value='".$row['temperature']."'/>";
				echo "<input type='hidden' class='post_allergies' value='".$row['allergies']."'/>";
				echo "<input type='hidden' class='post_operation' value='".$row['operation']."'/>";
				echo "<input type='hidden' class='post_cancer' value='".$row['cancer']."'/>";
				echo "<input type='hidden' class='post_others' value='".$row['others']."'/>";

				//conditions
				echo "<input type='hidden' class='post_asthma' value='".$row['asthma']."'/>";
				echo "<input type='hidden' class='post_heart_attack' value='".$row['heart_attack']."'/>";
				echo "<input type='hidden' class='post_kidney_stones' value='".$row['kidney_stones']."'/>";
				echo "<input type='hidden' class='post_stroke' value='".$row['stroke']."'/>";
				echo "<input type='hidden' class='post_diabetes' value='".$row['diabetes']."'/>";
				echo "<input type='hidden' class='post_hypertension' value='".$row['hypertension']."'/>";
				echo "<input type='hidden' class='post_lung_problem' value='".$row['lung_problem']."'/>";
				echo "<input type='hidden' class='post_tuberculosis' value='".$row['tuberculosis']."'/>";

			}

	?>
	