<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

$output = '';
$stmt = "SELECT * FROM record WHERE survey_status = 'FOR SURVEY' AND cdate = DATE(NOW())";
$result = mysqli_query($db_conn,$stmt);

	if(mysqli_num_rows($result)>0)
		{
			while ($row = mysqli_fetch_array($result)) 
			{
				echo "<tr>";
					echo "<td><a href='transaction_survey.php?survey_id=".$row['record_id']."&caller_no=".$row['caller_no']."'>".$row['caller_no']."</a></td>";
				echo "</tr>";

			}
		}
	else{
		echo "No data for survey";
	}

?>