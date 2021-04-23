<?php
include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';
date_default_timezone_set('Asia/Manila');

$member_no				 = $_POST['member_no'];
$caller_classification 	 = $_POST['caller_classification'];
$caller_no 				 = $_POST['caller_no'];
$patient_classification  = $_POST['patient_classification'];
$sales_program			 = $_POST['sales_program'];
$first_name 			 = $_POST['first_name'];
$last_name 				 = $_POST['last_name'];
$age 					 = $_POST['age'];
$gender 				 = $_POST['gender'];
$municipality 			 = $_POST['municipality'];
$status 				 = $_POST['status'];
$p_first_name			 = $_POST['p_first_name'];
$p_last_name			 = $_POST['p_last_name'];
$p_age					 = $_POST['p_age'];
$p_gender				 = $_POST['p_gender'];
$service_call 			 = $_POST['service_call'];
$protocol_evaluation	 = $_POST['protocol_evaluation'];
$concern 				 = $_POST['concern'];
$satisfaction			 = $_POST['satisfaction'];
$remarks 				 = $_POST['remarks'];
$referral 				 = $_POST['referral'];
$chief_complaint		 = $_POST['chief_complaint'];
$presumptive_diagnosis   = $_POST['presumptive_diagnosis'];
$secondary_diagnosis     = $_POST['secondary_diagnosis'];
$icd_code				 = $_POST['icd_code'];
$icd_description		 = $_POST['icd_description'];
$notes					 = $_POST['notes'];
$reason_of_call		     = $_POST['reason_of_call'];
$is_name				 = $_POST['is_name'];
$disease_type			 = $_POST['disease_type'];
$diseases				 = $_POST['diseases'];
$time_stamp			     = date("Y-m-d h:i:s a",time());

//mailer 
$is_email_to			 = $_POST['is_email_to'];
$is_email_cc			 = $_POST['is_email_cc'];
$is_campaign			 = $_POST['is_campaign'];

// --> hidden inputs

$cday				     = $_POST['cday'];
$shift					 = $_POST['shift'];
$cdate					 = $_POST['cdate'];
$ctime					 = $_POST['ctime'];
$plan  					 = $_POST['plan'];
$country 				 = $_POST['country'];
$province				 = $_POST['province'];
$zip_code				 = $_POST['zip_code'];
$region				     = $_POST['region'];
$caller_bracket_age      = $_POST['caller_bracket_age'];
$patient_bracket_age     = $_POST['patient_bracket_age'];
$survey_status			 = $_POST['survey_status'];
$doctor_name			 = $_POST['doctor_name'];

// --> additional inputs

$secondary_no 			 = $_POST['secondary_no'];
$address				 = $_POST['address'];
$email_address			 = $_POST['email_address'];
$blood_type				 = $_POST['blood_type'];
$height					 = $_POST['height'];
$weight					 = $_POST['weight'];
$rh						 = $_POST['rh'];
$blood_pressure		     = $_POST['blood_pressure'];
$pulse_rate				 = $_POST['pulse_rate'];
$respiratory_rate		 = $_POST['respiratory_rate'];
$temperature			 = $_POST['temperature'];
$allergies				 = $_POST['allergies'];
$cancer				     = $_POST['cancer'];
$operation				 = $_POST['operation'];
$others				 	 = $_POST['others'];
$asthma					 = $_POST['asthma'];
$diabetes				 = $_POST['diabetes'];
$heart_attack			 = $_POST['heart_attack'];
$hypertension			 = $_POST['hypertension'];
$kidney_stones			 = $_POST['kidney_stones'];
$lung_problem			 = $_POST['lung_problem'];
$tuberculosis			 = $_POST['tuberculosis'];
$stroke					 = $_POST['stroke'];
$smoke					 = $_POST['smoke'];
$alcohol				 = $_POST['alcohol'];

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
						 ,reason_of_call
						 ,is_name
						 ,disease_type
						 ,diseases
						 ,time_stamp
						 ,cday
						 ,shift
						 ,cdate
						 ,ctime
						 ,plan
						 ,country
						 ,province
						 ,zip_code
						 ,region
						 ,caller_bracket_age
						 ,patient_bracket_age
						 ,survey_status
						 ,doctor_name
						 ,campaign
						 ,secondary_no
						 ,address
						 ,email_address
						 ,blood_type
						 ,height
						 ,weight
						 ,rh
						 ,blood_pressure
						 ,pulse_rate
						 ,respiratory_rate
						 ,temperature
						 ,allergies
						 ,cancer
						 ,operation
						 ,others
						 ,asthma
						 ,diabetes
						 ,heart_attack
						 ,hypertension
						 ,kidney_stones
						 ,lung_problem
						 ,tuberculosis
						 ,stroke
						 ,smoke
						 ,alcohol)

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
					,'$reason_of_call'
					,'$is_name'
					,'$disease_type'
					,'$diseases'
					,'$time_stamp'
					,'$cday'
				 	,'$shift'
				 	,'$cdate'
				 	,'$ctime'
				 	,'$plan'
				 	,'$country'
				 	,'$province'
				 	,'$zip_code'
				 	,'$region'
				 	,'$caller_bracket_age'
				 	,'$patient_bracket_age'
				 	,'$survey_status'
				    ,'$doctor_name'
					,'$is_campaign'
					,'$secondary_no'
					,'$address'
					,'$email_address'
					,'$blood_type'
					,'$height'
					,'$weight'
					,'$rh'
					,'$blood_pressure'
					,'$pulse_rate'
					,'$respiratory_rate'
					,'$temperature'
					,'$allergies'
					,'$cancer'
					,'$operation'
					,'$others'
					,'$asthma'
					,'$diabetes'
					,'$heart_attack'
					,'$hypertension'
					,'$kidney_stones'
					,'$lung_problem'
					,'$stroke'
					,'$tuberculosis'
					,'$smoke'
					,'$alcohol')";


$query = mysqli_query($db_conn,$stmt);

$stmt2 = "SELECT  * FROM record INNER JOIN mailer ORDER BY record_id DESC LIMIT 1";
$query2 = mysqli_query($db_conn,$stmt2);

if ($query ===  false) {
}
else{
	if ($row = $query2 -> fetch_assoc())
		{
			if($row['disease_type'] == "COMMUNICABLE" and $row['sales_program'] == "PILOT SUTHERLAND")	
				{
					header("Location:mailer.php?tran_id=".$row['record_id'].'&risk=[HIGH PRIORITY] - '.'&chief_complaint='.$row['chief_complaint'].'&caller_no='.$row['caller_no'].'&patient_name='.$row['p_first_name'].' '.$row['p_last_name'].'&is_email_to='.$_POST['is_email_to'].'&is_email_cc='.$_POST['is_email_cc'].'&ssid='.$row['mail_sender'].'&key='.$row['mail_password'].'&alias='.$row['mail_name']);
				}
			elseif($row['disease_type'] == "NON COMMUNICABLE" and $row['sales_program'] == "PILOT SUTHERLAND")
				{
					header("Location:mailer.php?tran_id=".$row['record_id'].'&chief_complaint='.$row['chief_complaint'].'&caller_no='.$row['caller_no'].'&patient_name='.$row['p_first_name'].' '.$row['p_last_name'].'&is_email_to='.$_POST['is_email_to'].'&is_email_cc='.$_POST['is_email_cc'].'&ssid='.$row['mail_sender'].'&key='.$row['mail_password'].'&alias='.$row['mail_name']);	
				}
			else
				{
					header("Location:index.php?create=ok");
				}
		}
}
?>