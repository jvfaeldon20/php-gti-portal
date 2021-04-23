<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

//update emr
$svy_survey    			 = $_GET['survey_id'];

$stmt3 = "UPDATE record SET survey_status = 'DECLINED' WHERE record_id = '$svy_survey'  ";
$query = mysqli_query($db_conn,$stmt3);


if ($query ===  false) {
	header("Location: survey.php?create=fail");
}
else{
	header("Location:survey.php?create=ok");
}

?>