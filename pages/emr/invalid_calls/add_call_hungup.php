<?php
 include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';
date_default_timezone_set('Asia/Manila');

$member_no				 = "IC2";
$caller_classification 	 = $_POST['caller_classification'];
$caller_no 				 = $_POST['caller_no'];
$patient_classification  = $_POST['patient_classification'];
$sales_program			 = $_POST['sales_program'];
$first_name 			 = $_POST['first_name'];
$last_name 				 = $_POST['last_name'];
$age 					 = $_POST['age'];
$gender 				 = $_POST['gender'];
$municipality 			 = "CALL HUNG UP";
$status 				 = $_POST['status'];
$p_first_name			 = "CALL HUNG UP";
$p_last_name			 = "CALL HUNG UP";
$p_age					 = $_POST['p_age'];
$p_gender				 = "CALL HUNG UP";
$service_call 			 = "CALL HUNG UP";
$protocol_evaluation	 = "CALL HUNG UP";
$concern 				 = $_POST['concern'];
$satisfaction			 = $_POST['satisfaction'];
$remarks 				 = $_POST['remarks'];
$referral 				 = $_POST['referral'];
$chief_complaint		 = "CALL HUNG UP";
$presumptive_diagnosis   = "CALL HUNG UP";
$secondary_diagnosis     = $_POST['secondary_diagnosis'];
$icd_code				 = $_POST['icd_code'];
$icd_description		 = $_POST['icd_description'];
$notes					 = "CALL HUNG UP";
$time_stamp				 = date("Y-m-d h:i:s a",time());



//insert emr_record query
$stmt = "INSERT INTO record(member_no
						 ,caller_classification
						 ,caller_no
						 ,patient_classification
						 ,sales_program
						 ,first_name
						 ,last_name
						 ,age
						 ,gender
						 ,municipality
						 ,status
						 ,p_first_name
						 ,p_last_name
						 ,p_age
						 ,p_gender
						 ,service_call
						 ,protocol_evaluation
						 ,concern
						 ,satisfaction
						 ,remarks
						 ,referral
						 ,chief_complaint
						 ,presumptive_diagnosis
						 ,secondary_diagnosis
						 ,icd_code
						 ,icd_description
						 ,notes
						 ,time_stamp)


			 VALUES('$member_no'
					,'$caller_classification'
					,'$caller_no'
					,'$patient_classification'
					,'$sales_program'
					,'$first_name'
					,'$last_name'
					,'$age'
					,'$gender'
					,'$municipality'
					,'$status'
					,'$p_first_name'
					,'$p_last_name'
					,'$p_age'
					,'$p_gender'
					,'$service_call'
					,'$protocol_evaluation'
					,'$concern'
					,'$satisfaction'
					,'$remarks'
					,'$referral'
					,'$chief_complaint'
					,'$presumptive_diagnosis'
					,'$secondary_diagnosis'
					,'$icd_code'
					,'$icd_description'
					,'$notes'
					,'$time_stamp')";

$query = mysqli_query($db_conn,$stmt);

if ($query ===  false) {
	header("Location: ../index.php?create=fail");
}
else{
	header("Location: ../index.php?create=hungup");
}

?>