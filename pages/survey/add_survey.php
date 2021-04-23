<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';
date_default_timezone_set('Asia/Manila');

//add survey
$svy_caller_no		     = $_POST['svy_caller_no'];
$svy_doctor_name		 = $_POST['svy_doctor_name'];
$svy_cdate				 = date("Y-m-d");
$svy_ctime			     = date("h:i A");
$svy_wellness		     = $_POST['svy_wellness'];
$svy_caller_age			 = $_POST['svy_caller_age'];
$svy_survey1			 = $_POST['svy_survey1'];
$svy_survey2			 = $_POST['svy_survey2'];
$svy_survey3			 = $_POST['svy_survey3'];
$svy_comment			 = $_POST['svy_comment'];
$svy_municipality		 = $_POST['svy_municipality'];
$svy_province		 	 = $_POST['svy_province'];
$svy_region		 		 = $_POST['svy_region'];
$svy_country		     = $_POST['svy_country'];
$svy_remarks1            = $_POST['svy_remarks1'];
$svy_remarks2            = $_POST['svy_remarks2'];



//insert emr_record query
$stmt = "INSERT INTO survey(svy_caller_no
							,svy_doctor_name
							,svy_cdate
							,svy_ctime
							,svy_wellness
							,svy_caller_age
							,svy_survey1
							,svy_survey2
							,svy_survey3
							,svy_comment
							,svy_municipality
							,svy_province
							,svy_region
							,svy_country
							,svy_remarks1
							,svy_remarks2)

			 VALUES('$svy_caller_no'
							,'$svy_doctor_name'
							,'$svy_cdate'
							,'$svy_ctime'
							,'$svy_wellness'
							,'$svy_caller_age'
							,'$svy_survey1'
							,'$svy_survey2'
							,'$svy_survey3'
							,'$svy_comment'
							,'$svy_municipality'
							,'$svy_province'
							,'$svy_region'
							,'$svy_country'
							,'$svy_remarks1'
							,'$svy_remarks2')";

$query = mysqli_query($db_conn,$stmt);

//update emr
$svy_survey_id    			 = $_POST['svy_survey_id'];

$stmt2 = "UPDATE record SET survey_status = 'COMPLETED' WHERE record_id = '$svy_survey_id'  ";
$query2 = mysqli_query($db_conn,$stmt2);

if ($query ===  false) {
	header("Location:survey.php?create=fail");
}
else{
	header("Location:survey.php?create=ok");
}

?>