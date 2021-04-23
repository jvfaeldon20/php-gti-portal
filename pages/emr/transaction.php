<!DOCTYPE html>
<html>
<head>
	<title>GTI | Transaction</title>
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/emr.css">
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
</head>
<body>
	 <div class="container">
        	<!--NAV FIXED-->
        	<div class="row nav-fixed">
	            <nav class="navbar navbar-default nav-main">
	                <div class="container">
	                    <div class="navbar-header">
	                        <button class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	                            <span class="sr-only">Toggle navigation</span>
	                            <span class="icon-bar"></span>
	                            <span class="icon-bar"></span>
	                            <span class="icon-bar"></span>
	                        </button>
	                        <a class="navbar-brand" href="#">
	                            <img src="../../img/main/header-logo/gti_emr.png" class="gti-logo">
	                        </a>
	                    </div>
	                </div>
	            </nav>
	            <!--CONTAINER-->
            	<div class="container">
		            <!--NAVIGATION-->
			        <div class="row navbar-border navbar-base">
			            <div id="navbar" class="collapse navbar-collapse">
			                <ul class="nav navbar-nav">
			                    <!--CORPORATE-->
			                    <?php
			                      $link_corporate = '';

			                      if($_COOKIE['role'] == "ADMIN")
			                        {
			                          $link_corporate = "../main/corporate.php";
			                        }
			                      else
			                        {
			                          $link_corporate = "javascript:void()";
			                        }
			                    ?>
			                    <li class="link-margin"><a href="<?php echo $link_corporate; ?>" data-toggle="tooltip" title="Corporate">CORPORATE</a></li>
			                    <!--END OF CORPORATE-->

			                    <!--WELLNESS-->
			                    <?php
			                      $link_wellness = '';

			                      if($_COOKIE['role'] == 'WELLNESS')
			                        {
			                          $link_wellness = "../main/wellness.php";
			                        }
			                      elseif($_COOKIE['role'] == 'ADMIN')
			                        {
			                          $link_wellness = "../main/wellness.php";
			                        }
			                      else
			                        {
			                          $link_wellness = "javascript:void()";
			                        }
			                    ?>
			                    <li class="link-margin"><a href="<?php echo $link_wellness; ?>" data-toggle="tooltip" title="Wellness">WELLNESS</a></li>
			                    <!--END OF WELLNESS-->

			                    <!--DOCTOR-->
			                    <?php
			                      $link_doctor = '';

			                      if($_COOKIE['role'] == 'DOCTOR')
			                        {
			                          $link_doctor = "../main/doctor.php";
			                        }
			                      elseif($_COOKIE['role'] == 'ADMIN')
			                        {
			                          $link_wellness = "../main/wellness.php";
			                        }
			                      else
			                        {
			                          $link_doctor = "javascript:void()";
			                        }
			                    ?>
			                    <li class="link-margin"><a href="<?php echo $link_doctor; ?>" data-toggle="tooltip" title="Doctor">DOCTOR</a></li>
			                    <!--END OF DOCTOR-->

			                    <!--MANAGEMENT-->
			                    <?php
			                      $link_management = '';

			                      if($_COOKIE['role'] == 'ADMIN')
			                        {
			                          $link_doctor = "../main/management.php";
			                        }
			                      else
			                        {
			                          $link_doctor = "javascript:void()";
			                        }
			                    ?>
			                    <li class="link-margin"><a href="../main/management.php" data-toggle="tooltip" title="Management">MANAGEMENT</a></li>
			                    <!--END OF MANAGEMENT-->
			                </ul>
			             		<h3><a href="../main.php" data-toggle="tooltip" class="pull-right" title="Home"><i class="glyphicon glyphicon-home"></i></a></h3>
			            </div>
			        </div>
			    	<!--END OF NAVIGATION-->
            	</div>
            	<!--END CONTAINER-->
        	</div>
        	<!--END OF NAV FIXED-->
	 	<?php 
			include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

			$output = '';
			$stmt   = "SELECT * FROM record WHERE record_id =  ".$_GET["tran_id"]." ";
			$result = mysqli_query($db_conn,$stmt);

			if(mysqli_num_rows($result)>0)
				{
				while($row = mysqli_fetch_array($result))
					{					
	 	?>
	 <div class="container">
	 	<div class="row navbar-margin">
	 		<div class="col-md-3 section-left">
	 			<img src="<?php echo '../users/img/admin.jpg' ?>" class="img-circle user-photo">
		 			<p class="user-tran-id" name="record_id"><?php echo '<br>'; ?></p>
		 			<div class="">
						<a href="#" data-toggle="modal" data-target="#modal_new_transaction" class="userimg"><img src="..\..\img\emr\newcall.png" class="img-circle user-menu"></a>
						<a href="#" data-toggle="modal" data-target="#modal_transaction_history" class="userimg"><img src="..\..\img\emr\history.png" class="img-circle user-menu"></a>
						<a href="#" data-toggle="modal" data-target="#modal_send_sms" class="userimg" id="get_number">
							<img src="..\..\img\emr\sendsms.png" class="img-circle user-menu" >
						</a>
		 			</div>
			 		<p class="text-justify">
		 				<h3>Hi! <strong class="user-name"><?php echo $_COOKIE['first_name'].' '.$_COOKIE['last_name']; ?></strong></h3>
			 				<strong class="user-role"><?php echo $_COOKIE['role']; ?></strong>
			 		</p>

	 		</div>
	 		<div class="col-md-8 section-right border-left">
	 			<form class="form-inline" method="POST" action="add_record.php">
	 				<input type="hidden" name="doctor_name" value="<?php echo $_COOKIE['first_name'].' '.$_COOKIE['last_name']; ?>">
	 					<div class="well well-sm well-bg">
							<label class ="label-width label-emr">MEMBER INFORMATION</label>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Membership</label>
									<input type="text" name="member_no" placeholder="MEMBERSHIP NO." class="form-control bs" id="member_no" value="<?php echo $row['member_no']; ?>" readonly="readonly" required>
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Caller Classification</label>	
								<select name="caller_classification" id="caller_classification" class="form-control no-border-radius caller_classification bs"  required>
								  <option value="SUBSCRIBER">SUBSCRIBER</option>
								  <option value="NON-MEMBER" selected>NON-MEMBER</option>
								  <option value="EXTENSION">EXTENSION</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Caller No.</label>
									<input type="text" name="caller_no" id="#caller_no" placeholder="ex. 09*********" class="form-control bs" value="<?php echo $row['caller_no']; ?>" maxlength="11"  required>
								<label class ="label-width label-emr ">Secondary No.(Opt.)</label>
									<input type="text" name="secondary_no" id="#secondary_no" placeholder="ex. 09*********" class="form-control bs" maxlength="11">
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Sales Program</label>
									<input type="text" name="sales_program" id="sales_program" placeholder="SALES PROGRAM" class="form-control sales_program bs" size="18px" value="<?php echo $row['sales_program'];?>"  required>
									<a href="#" data-toggle="modal" data-target="#modal_sales_program"><i class="glyphicon glyphicon-search"></i></a>
							</div>
						</div>
						<br>
						<!--CALLER INFORMATION-->
						<div class="well well-sm well-bg"><i class="glyphicon glyphicon-phone-alt"></i>&nbsp&nbsp&nbsp
							<label class ="label-width label-emr ">CALLER INFORMATION</label>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">First Name</label>
									<input type="text" name="first_name" id="first_name" placeholder="FIRST NAME" class="form-control first_name bs" value="<?php echo $row['first_name'];?>" readonly="readonly" required>
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Last Name</label>
									<input type="text" name="last_name" id="last_name" placeholder="LAST NAME" class="form-control last_name bs" value="<?php echo $row['last_name']; ?>" readonly="readonly" required>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Age</label>
									<input type="text" name="age" id="age" class="form-control age bs"    required>
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Gender</label>
								<select name="gender" id="gender" placeholder="GENDER" class="form-control no-border-radius gender bs" gender="<?php echo $row['gender']; ?>" required>
									<option value="MALE">MALE</option>
									<option value="FEMALE">FEMALE</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<label class ="label-width label-emr ">Address</label>
									<input type="text" name="address"  placeholder="ex. ACACIA PARK HOMES BLK 4 LOT 2 BRGY. SAIMSIM" class="form-control no-border-radius"  autocomplete="off" size="84%" required>
								
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Municipality</label>
									<input type="text" name="municipality" id="location" placeholder="SEARCH HERE >>" class="form-control bs" size="18px" required>
									<a href="#" data-toggle="modal" data-target="#modal_municipality"><i class="glyphicon glyphicon-search"></i></a>
							</div>
							<div class="col-lg-6"> 
								<label class ="label-width label-emr ">KMD Status</label>
								<select name="status" id="status" placeholder="Status" class="form-control no-border-radius status bs"  required>
									<option value="ACTIVE">ACTIVE</option>
									<option value="BALANCE DUE">BALANCE DUE</option>
									<option value="BLANK">BLANK</option>
									<option value="CANCELLED">CANCELLED</option>
									<option value="FAILED ACTIVATION">FAILED ACTIVATION</option>
									<option value="FAILED RENEWAL">FAILED RENEWAL</option>
								</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Civil Status</label>
								<select name="civil_status" id="civil_status" placeholder="CIVIL STATUS" class="form-control no-border-radius civil_status bs"  required>
									<option value="SINGLE">SINGLE</option>
									<option value="MARRIED">MARRIED</option>
									<option value="WIDOWED">WIDOWED</option>
								</select>
								
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Email Address</label>
									<input type="email" name="email_address" class="form-control no-border-radius email_address bs_eadd"  autocomplete="off" required>
									<input type="checkbox" name="email_address" class="email_address_na vital_chk " value="NONE">
									<label class ="label-width-condition-eadd label-emr"></label>
							</div>
						</div><br>
						<!--PATIENT INFORMATION-->
						<div class="well well-sm well-bg"><i class="glyphicon glyphicon-th-list"></i>&nbsp&nbsp&nbsp
							<label class ="label-width label-emr ">PATIENT INFORMATION</label>
						</div>
						<input type="checkbox" name="get_caller_info" id="get_caller_info" value="YES">&nbsp&nbsp&nbspMatch as Caller Info
						<div class="row"><br>
								<div class="col-lg-6">
									<label class ="label-width label-emr ">Patient Classification</label>
									<select name="patient_classification" id="patient_classification" class="form-control patient_classification no-border-radius patient_classification bs"  required>
										<option value="SUBSCRIBER">SUBSCRIBER</option>
										<option value="NON-MEMBER">NON-MEMBER</option>
										<option value="EXTENSION">EXTENSION</option>
									</select>
								</div>
								<div class="col-lg-6"></div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">First Name</label>
									<input type="text" name="p_first_name" id="p_first_name" class="form-control p_first_name bs" required>
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Last Name</label>
									<input type="text" name="p_last_name" id="p_last_name"  class="form-control p_last_name bs" required>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Age</label>
									<input type="text" name="p_age" id="p_age" class="form-control p_age bs"  required>
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Gender</label>
								<select name="p_gender" id="p_gender" placeholder="GENDER" class="form-control no-border-radius p_gender bs" required>
									<option value="MALE">MALE</option>
									<option value="FEMALE">FEMALE</option>
								</select>
							</div>
						</div>
						<!--VITALS-->
						<label>VITALS</label>
						<div class="row">
							<div class="col-lg-6">
									<label class ="label-width label-emr ">Blood Type</label>
									<select name="blood_type" id="blood_type" class="form-control no-border-radius blood_type vital"  required>
										<option value="TYPE A">TYPE A</option>
										<option value="TYPE B">TYPE B</option>
										<option value="TYPE AB">TYPE AB</option>
										<option value="TYPE O">TYPE O</option>
									</select>
									<input type="checkbox" name="blood_type" class="blood_type_na vital_chk" value="NOT AWARE">N/A
							</div>
							<div class="col-lg-6">
									<label class ="label-width label-emr ">RH</label>
										<select name="rh" id="rh" class="form-control no-border-radius rh vital"  required>
											<option value="POSITIVE">POSITIVE</option>
											<option value="NEGATIVE">NEGATIVE</option>
										</select>
									<input type="checkbox" name="rh" class="rh_na vital_chk" value="NOT AWARE">N/A
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Height(ft)</label>
								<input type="text" name="height" id="" class="form-control height vital"  required>
								<input type="checkbox" name="height" class="height_na vital_chk" value="NOT AWARE">N/A
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Weight(lbs)</label>
									<input type="text" name="weight" class="form-control weight vital"  required>
									<input type="checkbox" name="weight" class="weight_na vital_chk" value="NOT AWARE">N/A
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Blood Pressure</label>
									<input type="text" name="blood_pressure" placeholder="" class="form-control blood_pressure vital"  required>
									<input type="checkbox" name="blood_pressure" class="blood_pressure_na vital_chk" value="NOT AWARE">N/A
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Pulse Rate</label>
								<input type="text" name="pulse_rate" class="form-control pulse_rate vital"  required>
								<input type="checkbox" name="pulse_rate" class="pulse_rate_na vital_chk" value="NOT AWARE">N/A
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Respiratory Rate</label>
									<input type="text" name="respiratory_rate" class="form-control respiratory_rate vital"  required>
									<input type="checkbox" name="respiratory_rate" class="respiratory_rate_na vital_chk" value="NOT AWARE">N/A
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr">Temperature</label>
								<input type="text" name="temperature" class="form-control temperature vital"  required>
								<input type="checkbox" name="temperature" class="temperature_na vital_chk" value="NOT AWARE">N/A
							</div>
						</div>
						<br>
						<!--END VITALS-->
						<!--PAST MEDICAL HISTORY-->
						<label>PAST MEDICAL HISTORY</label>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Allergies</label>
									<input type="checkbox" name="allergies" class="allergies_na vital_chk" value="NOT AWARE">
									<input type="text" name="allergies" class="form-control allergies pmh"  required>
								<label class ="label-width label-emr ">Cancer</label>
									<input type="checkbox" name="cancer" class="cancer_na vital_chk" value="NOT AWARE">
									<input type="text" name="cancer" class="form-control cancer pmh"  required>
								<label class ="label-width label-emr ">Asthma</label>
									<input type="checkbox" name="asthma" class="asthma_na vital_chk" value="ASTHMA">
									<input type="text" name="asthma" class="form-control asthma pmh"  required>
								<label class ="label-width label-emr ">Heart Attack</label>
									<input type="checkbox" name="heart_attack" class="heart_attack_na vital_chk" value="HEART ATTACK">
									<input type="text" name="heart_attack" class="form-control heart_attack pmh"  required>
								<label class ="label-width label-emr ">Kidney Stones</label>
									<input type="checkbox" name="kidney_stones" class="kidney_stones_na vital_chk" value="KIDNEY STONES">
									<input type="text" name="kidney_stones" class="form-control kidney_stones pmh"  required>
								<label class ="label-width label-emr ">Stroke</label>
									<input type="checkbox" name="stroke" class="stroke_na vital_chk" value="STROKE">
									<input type="text" name="stroke" class="form-control stroke pmh"  required>
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Operation</label>
									<input type="checkbox" name="operation" class="operation_na vital_chk" value="NOT AWARE">
									<input type="text" name="operation" class="form-control operation pmh"  required>
								<label class ="label-width label-emr ">Others</label>
									<input type="checkbox" name="others" class="others_na vital_chk" value="NOT AWARE">
									<input type="text" name="others" class="form-control others pmh"  required>
								<label class ="label-width label-emr ">Diabetes</label>
									<input type="checkbox" name="diabetes" class="diabetes_na vital_chk" value="DIABETES">
									<input type="text" name="diabetes" class="form-control diabetes pmh"  required>
								<label class ="label-width label-emr ">Hypertension</label>
									<input type="checkbox" name="hypertension" class="hypertension_na vital_chk" value="HYPERTENSION">
									<input type="text" name="hypertension" class="form-control hypertension pmh"  required>
								<label class ="label-width label-emr ">Lung Problem</label>
									<input type="checkbox" name="lung_problem" class="lung_problem_na vital_chk" value="LUNG PROBLEM">
									<input type="text" name="lung_problem" class="form-control lung_problem pmh"  required>
								<label class ="label-width label-emr ">Tuberculosis</label>
									<input type="checkbox" name="tuberculosis" class="tuberculosis_na vital_chk" value="TUBERCULOSIS">
									<input type="text" name="tuberculosis" class="form-control tuberculosis pmh"  required>
							</div>
						</div>
						<span id="vitals"></span>
						<br><hr><br>
						<div class="row">
							<div class="col-lg-12">
								<label class ="label-width label-emr ">Do you smoke?</label><br>
								<div>
									<label class="label-emr concern"><input type="radio" name="smoke" class="radio vital_chk" value="YES" required>Yes</label>
									<label class="label-emr concern" ><input type="radio" name="smoke" class="radio vital_chk" value="NO" required>No</label>
								</div>	
							</div>
							<div class="col-lg-12"><br>
								<label class ="label-width label-emr ">Do you drink alcohol beverages?</label><br>
								<div>
									<label class="label-emr concern"><input type="radio" name="alcohol" class="radio vital_chk" value="YES" required>Yes</label>
									<label class="label-emr concern" ><input type="radio" name="alcohol" class="radio vital_chk" value="NO" required>No</label>
								</div>	
							</div>
						</div>
						<br>
						<!--END OF PAST MEDICAL HISTORY-->
						<!--DIAGNOSIS-->
						<div class="well well-sm well-bg"><i class="glyphicon glyphicon-check"></i>&nbsp&nbsp&nbsp<label class ="label-width label-emr ">DIAGNOSIS</label></div>
						<div class="row">
							<div class="col-lg-12">
								<label class ="label-width label-emr ">Chief Complaint/Symptoms</label><br>
									<input type="text" name="chief_complaint" id="symptoms" placeholder="SEARCH HERE >>" class="form-control textarea-symptoms" required>
									<a href="#" data-toggle="modal" data-target="#modal_symptoms"><span class="glyphicon glyphicon-search"></span></a>
							</div><br>
							<div class="col-lg-12">
								<label class ="label-width label-emr ">Presumptive Diagnosis</label><br>
									<textarea type="text" name="presumptive_diagnosis" class="form-control noresize no-border-radius presumptive_diagnosis" required></textarea>
							</div><br>
							<div class="col-lg-12">
								<label class ="label-width label-emr ">Secondary Diagnosis(Optional)</label><br>
									<textarea type="text" name="secondary_diagnosis" class="form-control no-border-radius secondary_diagnosis"></textarea>
							</div><br>
							<div class="col-lg-12">
								<label class ="label-width label-emr ">ICD Code</label>
									<input type="text" name="icd_code" id="icd_code" class="form-control" placeholder="SEARCH HERE >>"   required>
									<a href="#" data-toggle="modal" data-target="#modal_icd_code"><i class="glyphicon glyphicon-search"></i></a>
							</div>
							<div class="col-lg-12">
								<label class ="label-width label-emr " >ICD Code Description</label>
									<input type="text" name="icd_description" id="icd_description" class="form-control" size="65px"   required>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Disease Type</label>
								<div>
									<label class ="label-width label-emr "><input type="radio" name="disease_type" id="disease_type" class="form-control disease_type" value="COMMUNICABLE" disabled="true"  required>Communicable</label>
									<label class ="label-width label-emr "><input type="radio" name="disease_type" id="disease_type" class="form-control disease_type" value="NON COMMUNICABLE" disabled="true" required>Non Communicable</label>
								</div>
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr">Diseases</label>
								<div>
									<select name="diseases" id="diseases" class="form-control diseases no-border-radius diseases" disabled="true" required>
									<option value="MEASLES">MEASLES</option>
									<option value="CHICKEN POX">CHICKEN POX</option>
									<option value="MUMPS">MUMPS</option>
									<option value="CONJUNCTIVITIS / SORE EYES">CONJUNCTIVITIS / SORE EYES</option>
									<option value="TUBERCULOSIS">TUBERCULOSIS</option>
									<option value="ACUTE BRONCHITIS">ACUTE BRONCHITIS</option>
									<option value="PNEUMONIA">PNEUMONIA</option>
									<option value="INFLUENZA">INFLUENZA</option>
									<option value="HEPATITIS A">HEPATITIS A</option>
									</select>
								</div>
							</div>
						</div><br>
						<!--END OF DIAGNOSIS-->
						<!--SERVICE CALL-->
						<div class="well well-sm well-bg"><i class="glyphicon glyphicon-stats"></i>&nbsp&nbsp&nbsp
							<label class ="label-width label-emr ">SERVICE CALL</label>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<label class ="label-width label-emr ">Service Call</label>
									<input type="text" name="service_call" id="service_call" placeholder="SERVICE CALL" class="form-control" size="38%" required>
									<a href="#" data-toggle="modal" data-target="#modal_service_call">
										<i class="glyphicon glyphicon-search"></i>
									</a>
							</div>
							<div class="col-lg-12">
									<label class ="label-width label-emr ">Protocol Evaluation</label>
									<select name="protocol_evaluation" placeholder="Protocol Evaluation" class="form-control no-border-radius protocol_evaluation" required>
										<option value="(0-24) IMMEDIATE MEDICAL ATTENTION">(0-24) IMMEDIATE MEDICAL ATTENTION</option>
										<option value="(0-4) EMERGENT">(0-4) EMERGENT</option>
										<option value="(0-72) REFERRAL">(0-72) REFERRAL</option>
										<option value="ASSESSMENT">ASSESSMENT</option>
										<option value="EMERGENCY">EMERGENCY</option>
									</select>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Remarks</label>
								<select name="remarks" class="form-control no-border-radius remarks" required>
									<option value="FOR MEDICAL CONSULT">MEDICAL CONSULT</option>
								</select>
							</div>
							<div class="col-lg-6">
								<label class ="label-width label-emr ">Referral</label>
								<select name="referral" class="form-control no-border-radius referral" required>
									<option value="LIFE LINE AMBULANCE">LIFELINE AMBULANCE</option>
									<option value="MEDGROCER">MEDGROCER</option>
									<option value="FAMILY DOC">FAMILY DOC</option>
									<option value="RITEMED">RITEMED</option>
									<option value="GENERICA">GENERICA</option>
									<option value="AIDE">AIDE</option>
									<option value="N/A">N/A</option>
								</select>
							</div>
						</div><br>


						<!--NOTES-->
						<div class="well well-sm well-bg"><i class="glyphicon glyphicon-check"></i>&nbsp&nbsp&nbsp<label class ="label-width label-emr ">NOTES</label></div>
						<div class="row">
							<div class="col-lg-12">
								<label class ="label-width label-emr ">Notes</label><br>
									<textarea type="text" name="notes" id="notes" placeholder="NOTES" class="form-control no-border-radius notes" required></textarea>
							</div>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<label class ="label-width label-emr ">Reason of call</label>
								<select name="reason_of_call" id="reason_of_call" class="form-control no-border-radius reason_of_call"  disabled="true" required>
									<option value="CALLED IN SICK">CALLED IN SICK</option>
									<option value="ENDORSEMENT">ENDORSEMENT</option>
									<option value="CONSULTATION">CONSULTATION</option>
									<option value="CALLED IN SICK BUT FIT TO WORK">CALLED IN SICK BUT FIT TO WORK</option>
									<option value="REFERRED TO ER">REFERRED TO ER</option>
									<option value="REFERRED TO ER FOR VALIDATION">REFERRED TO ER FOR VALIDATION</option>
									<option value="CALLED IN DUE TO SICK FAMILY">CALLED IN DUE TO SICK FAMILY</option>
								</select>				
							</div>
							<div class="col-lg-12">
								<label class ="label-width label-emr ">IS Name</label>
								<select name="is_name" id="is_name" class="form-control no-border-radius is_name" disabled="true" required>
									<?php
										$stmt_is_name = "SELECT i.is_name FROM is_name AS i INNER JOIN sales_program s ON i.is_sales_program = s.sales_program WHERE i.is_sales_program = 'PILOT SUTHERLAND' ";

										$query_is_name = mysqli_query($db_conn, $stmt_is_name);
										while ($row_is_name = mysqli_fetch_array($query_is_name)) 
											{
												echo "<option>".$row_is_name['is_name']."</option>";
											}
									?>
								</select>
							</div>
						</div><br>
						<span id="is_feature_2"></span>
						<!--SATISFACTION-->
						<div class="well well-sm well-bg"><i class="glyphicon glyphicon-question-sign"></i>&nbsp&nbsp&nbsp
							<label class ="label-width label-emr ">SATISFACTION</label>
						</div>
						<div class="row">
							<div class="col-lg-12">
								<label class ="label-width label-emr ">Did I address your concern</label><br>
								<div>
									<label class="label-emr concern"><input type="radio" name="concern" class="radio" value="YES" required>Yes</label>
									<label class="label-emr concern" ><input type="radio" name="concern" class="radio" value="NO" required>No</label>
									<label class="label-emr concern" ><input type="radio" name="concern" class="radio" value="N/A" required>N/A</label>
								</div>	
							</div><br><br>
							<div class="col-lg-12">
								<label class="label-emr"  class ="label-width label-emr ">Are you satisfied?</label><br>
								<div>
									<label class="label-emr satisfaction " ><input type="radio" name="satisfaction" class="radio" value="YES" required>Yes</label>
									<label class="label-emr satisfaction " ><input type="radio" name="satisfaction" class="radio" value="NO" required>No</label>
									<label class="label-emr satisfaction " ><input type="radio" name="satisfaction" class="radio" value="N/A" required>N/A</label>
								</div>	
							</div>
						</div><br>

						
					<input type="submit" class="btn btn-emr no-border-radius pull-right btn-pd" value="Save">
					<a href="#" data-toggle="modal" data-target="#modal_summary" class="btn btn-emr no-border-radius summary pull-right btn-pd">Verify</a>
					<input type="hidden" name="ctime" id="ctime" class="form-control ctime" value="<?php date_default_timezone_set('Asia/Manila'); echo date('g:i A'); ?>">
			 		<input type="hidden" name="cday"  	 id="cday"  placeholder="cday" class="form-control" value="<?php echo strtoupper(date('l'));?>">
					<input type="hidden"   name="shift"	 id="shift" placeholder="shift" class="form-control">
					<input type="hidden" name="cdate" 	 id="cdate" placeholder="cdate" class="form-control" value="<?php echo date("Y-m-d");?>">
					<input type="hidden" name="plan" 	 id="plan"  placeholder="plan" class="form-control" value="<?php echo $row['plan']; ?>" >
					<input type="hidden" name="country"  id="country"  placeholder="country" class="form-control">
					<input type="hidden" name="province" id="province" placeholder="province" class="form-control">
					<input type="hidden" name="zip_code" id="zip_code" placeholder="zip_code" class="form-control">
					<input type="hidden" name="region"   id="region"   placeholder="region" class="form-control caller_bracket_age">
					<input type="hidden" name="caller_bracket_age"   id="caller_bracket_age" placeholder="caller_bracket_age" class="form-control caller_bracket_age">
					<input type="hidden" name="patient_bracket_age"  id="patient_bracket_age" placeholder="patient_bracket_age" class="form-control patient_bracket_age">
					<input type="hidden" name="survey_status"   	 id="survey_status"   placeholder="survey_status" class="form-control" value="FOR SURVEY">
					<input type="hidden" name="record_id" placeholder="record_id" class="form-control record_id" value="<?php echo $_GET['tran_id']; ?>">
					<input type="hidden" name="cc2" placeholder="cc2" class="form-control cc2" value="<?php echo $row['caller_classification']; ?>">
				</form>
				<div class="row"><br><br></div>
				 <?php 
			     }
				} 
			   ?>
			</div>
		</div>
	 </div>
</div>
<?php include 'modal/_modal_new_transaction.php'; ?>
<?php include 'modal/_modal_send_sms.php'; ?>
<?php include 'modal/_modal_transaction_history.php';?>
<?php include 'modal/_modal_sales_program.php'; ?>
<?php include 'modal/_modal_municipality.php'; ?>
<?php include 'modal/_modal_service_call.php'; ?>
<?php include 'modal/_modal_icd_code.php'; ?>
<?php include 'modal/_modal_symptoms.php'; ?>
<?php include 'modal/_modal_summary.php'; ?>
<script>	 
//initialization
$(document).ready(function(){
	var ss = $('.cc2').val(); 

		$('.caller_classification').val('');
		$('.gender').val('');
		$('.status').val('');
		$('.patient_classification').val('');
		$('.p_gender').val('');
		$('.civil_status').val('');
		$('.protocol_evaluation').val('');
		$('.referral').val('');
		$('.diseases').val('');
		$('.reason_of_call').val('');
		$('.is_name').val('');
		$('.user-tran-id').css({'color': '#fff'});
		$('.caller_classification').val(ss);
		$(".blood_type").val('');
		$(".rh").val('');
		
		//past medical history
		$(".allergies").val('NONE');
		$(".allergies").attr("readonly","true");
		$(".cancer").val('NONE');
		$(".cancer").attr("readonly","true");   
		$(".operation").val('NONE');
		$(".operation").attr("readonly","true");   
		$(".others").val('NONE');
		$(".others").attr("readonly","true"); 
		$(".asthma").val('NONE');
		$(".asthma").attr("readonly","true");
		$(".diabetes").val('NONE');
		$(".diabetes").attr("readonly","true");  
		$(".heart_attack").val('NONE');
		$(".heart_attack").attr("readonly","true");  
		$(".hypertension").val('NONE');
		$(".hypertension").attr("readonly","true");  
		$(".kidney_stones").val('NONE');
		$(".kidney_stones").attr("readonly","true");  
		$(".lung_problem").val('NONE');
		$(".lung_problem").attr("readonly","true");  
		$(".stroke").val('NONE');
		$(".stroke").attr("readonly","true");  
		$(".tuberculosis").val('NONE');
		$(".tuberculosis").attr("readonly","true"); 

		//fetch vitals & known conditions	
		$.ajax({
			//reference
			url: 'table/_tbl_vitals.php',
			type: 'GET',
			//$_GET['is_name']
			data: {member_no: $("#member_no").val()},
			//if query success
			success: function(output){
				//	
				$('#vitals').html(output)
			}
		})
				 	
});

//on modal close
$('.close').click(function(){
	$('.modal .form-control').val("");
	$('#result_icd').html('');
	$('#result_municipality').html("");
	$('#search_municipality').html("");
	$('#result_transaction').html("");
	//ongoing
});

//on keyup to UPPER CASE for input
$("input[type=text]").keyup(function(){
  $(this).val( $(this).val().toUpperCase() );
});

//on keypress to UPPER CASE for textarea
$("textarea[type=text]").keyup(function(){
  $(this).val( $(this).val().toUpperCase() );
});

//if checkbox is checked..
$('[name="get_caller_info"]').change(function()
    {
	    var cc = $('.caller_classification').val();
		var pc = $('.patient_classification').val(); 	
	    
	    	if ($(this).is(':checked')) 
	    	{

	    			//get caller information > patient information
				    $('.p_first_name').val($('.first_name').val());
				 	$('.p_last_name').val($('.last_name').val());
				 	$('.p_age').val($('.age').val());
				 	$('.p_gender').val($('.gender').val());
				 	$('.patient_classification').val($('.caller_classification').val());
				 	$('.patient_bracket_age').val($('.caller_bracket_age').val());

				 	// read only patient information
					$(".patient_classification").css({pointerEvents:"none"}); 
					$(".patient_classification").css({"background-color":"#eee"}); 
					$(".p_first_name").attr("readonly","true"); 		  
					$(".p_last_name").attr("readonly","false");           
					$(".p_age").attr("readonly","false");                 
					$(".p_gender").css({pointerEvents:"none"}); 
					$(".p_gender").css({"background-color":"#eee"}); 

					// read only caller information
					$(".caller_classification").css({pointerEvents:"none"});             
					$(".caller_classification").css({"background-color":"#eee"});              
					$(".age").attr("readonly","false");              
					$(".gender").css({pointerEvents:"none"});               
					$(".gender").css({"background-color":"#eee"});

				    //get vitals | known condition
				    //BLOOD TYPE
				    if($('.post_blood_type').val() == 'NOT AWARE')
					    {
							$('.blood_type_na').prop('checked',true);
		    				$(".blood_type").attr("readonly","true");   

					    }
					 else
					 	{
						 	$('.blood_type').val($('.post_blood_type').val());
					 	}

					 //HEIGHT
					  if($('.post_height').val() == 'NOT AWARE')
					    {
							$('.height_na').prop('checked',true);
							$('.height').val('');
		    				$(".height").attr("readonly","true");   

					    }
					 else
					 	{
						 	$('.height').val($('.post_height').val());
					 	}

					  //BLOOD_PRESSURE
					  if($('.post_blood_pressure').val() == 'NOT AWARE')
					    {
							$('.blood_pressure_na').prop('checked',true);
							$('.blood_pressure').val('');
		    				$(".blood_pressure").attr("readonly","true");   

					    }
					 else
					 	{
						 	$('.blood_pressure').val($('.post_blood_pressure').val());
					 	}	
	
					//RESPIRATORY_RATE
					  if($('.post_respiratory_rate').val() == 'NOT AWARE')
					    {
							$('.respiratory_rate_na').prop('checked',true);
							$('.respiratory_rate').val('');
		    				$(".respiratory_rate").attr("readonly","true");   

					    }
					 else
					 	{
						 	$('.respiratory_rate').val($('.post_respiratory_rate').val());
					 	}	
				 	
					//RH
					  if($('.post_rh').val() == 'NOT AWARE')
					    {
							$('.rh_na').prop('checked',true);
							$('.rh').val('');
		    				$(".rh").attr("readonly","true");   

					    }
					 else
					 	{
						 	$('.rh').val($('.post_rh').val());
					 	}

					 //WEIGHT
					  if($('.post_weight').val() == 'NOT AWARE')
					    {
							$('.weight_na').prop('checked',true);
							$('.weight').val('');
		    				$(".weight").attr("readonly","true");   

					    }
					 else
					 	{
						 	$('.weight').val($('.post_weight').val());
					 	}

					 //WEIGHT
					  if($('.post_pulse_rate').val() == 'NOT AWARE')
					    {
							$('.pulse_rate_na').prop('checked',true);
							$('.pulse_rate').val('');
		    				$(".pulse_rate").attr("readonly","true");   

					    }
					 else
					 	{
						 	$('.pulse_rate').val($('.post_pulse_rate').val());
					 	}

					  //TEMPERATURE
					  if($('.post_temperature').val() == 'NOT AWARE')
					    {
							$('.temperature_na').prop('checked',true);
							$('.temperature').val('');
		    				$(".temperature").attr("readonly","true");   

					    }
					 else
					 	{
						 	$('.temperature').val($('.post_temperature').val());
					 	}

					
					//format vitals field
					//ALLERGIES
					  if($('.post_allergies').val() == 'NONE')
					    {
							$('.allergies_na').prop('checked',false);
							$('.allergies').val('');
		    				$(".allergies").attr("readonly","true");   

					    }
					 else
					 	{
					 		$('.allergies_na').prop('checked',true);
		    				$(".allergies").removeAttr("readonly"); 
						 	$('.allergies').val($('.post_allergies').val());
					 	}
					
					//CANCER
					  if($('.post_cancer').val() == 'NONE')
					    {
							$('.cancer_na').prop('checked',false);
							$('.cancer').val('');
		    				$(".cancer").attr("readonly","true");   

					    }
					 else
					 	{
					 		$('.cancer_na').prop('checked',true);
		    				$(".cancer").removeAttr("readonly"); 
						 	$('.cancer').val($('.post_cancer').val());
					 	}

					 //OPERATION
					  if($('.post_operation').val() == 'NONE')
					    {
							$('.operation_na').prop('checked',false);
							$('.operation').val('');
		    				$(".operation").attr("readonly","true");   

					    }
					 else
					 	{
					 		$('.operation_na').prop('checked',true);
		    				$(".operation").removeAttr("readonly"); 
						 	$('.operation').val($('.post_operation').val());
					 	}

					 //OTHERS
					  if($('.post_others').val() == 'NONE')
					    {
							$('.others_na').prop('checked',false);
							$('.others').val('');
		    				$(".others").attr("readonly","true");   

					    }
					 else
					 	{
					 		$('.others_na').prop('checked',true);
		    				$(".others").removeAttr("readonly"); 
						 	$('.others').val($('.post_others').val());
					 	}

					 //ASTHMA
					  if($('.post_asthma').val() == 'NONE')
					    {
							$('.asthma_na').prop('checked',false);
							$('.asthma').val('');
		    				$(".asthma").attr("readonly","true");   

					    }
					 else
					 	{
					 		$('.asthma_na').prop('checked',true);
		    				$(".asthma").removeAttr("readonly"); 
						 	$('.asthma').val($('.post_asthma').val());
					 	}	

					 //DIABETES
					  if($('.post_diabetes').val() == 'NONE')
					    {
							$('.diabetes_na').prop('checked',false);
							$('.diabetes').val('');
		    				$(".diabetes").attr("readonly","true");   

					    }
					 else
					 	{
					 		$('.diabetes_na').prop('checked',true);
		    				$(".diabetes").removeAttr("readonly"); 
						 	$('.diabetes').val($('.post_diabetes').val());
					 	}

					 //HEART ATTACK
					  if($('.post_heart_attack').val() == 'NONE')
					    {
							$('.heart_attack_na').prop('checked',false);
							$('.heart_attack').val('');
		    				$(".heart_attack").attr("readonly","true");   

					    }
					 else
					 	{
					 		$('.heart_attack_na').prop('checked',true);
		    				$(".heart_attack").removeAttr("readonly"); 
						 	$('.heart_attack').val($('.post_heart_attack').val());
					 	}	
					 	
					//HYPERTENSION
					  if($('.post_hypertension').val() == 'NONE')
					    {
							$('.hypertension_na').prop('checked',false);
							$('.hypertension').val('');
		    				$(".hypertension").attr("readonly","true");   

					    }
					 else
					 	{
					 		$('.hypertension_na').prop('checked',true);
		    				$(".hypertension").removeAttr("readonly"); 
						 	$('.hypertension').val($('.post_hypertension').val());
					 	}

					 //KIDNEY STONES
					  if($('.post_kidney_stones').val() == 'NONE')
					    {
							$('.kidney_stones_na').prop('checked',false);
							$('.kidney_stones').val('');
		    				$(".kidney_stones").attr("readonly","true");   

					    }
					 else
					 	{
					 		$('.kidney_stones_na').prop('checked',true);
		    				$(".kidney_stones").removeAttr("readonly"); 
						 	$('.kidney_stones').val($('.post_kidney_stones').val());
					 	}

					 //LUNG PROBLEM
					  if($('.post_lung_problem').val() == 'NONE')
					    {
							$('.lung_problem_na').prop('checked',false);
							$('.lung_problem').val('');
		    				$(".lung_problem").attr("readonly","true");   

					    }
					 else
					 	{
					 		$('.lung_problem_na').prop('checked',true);
		    				$(".lung_problem").removeAttr("readonly"); 
						 	$('.lung_problem').val($('.post_lung_problem').val());
					 	}
					 
					 //STROKE
					  if($('.post_stroke').val() == 'NONE')
					    {
							$('.stroke_na').prop('checked',false);
							$('.stroke').val('');
		    				$(".stroke").attr("readonly","true");   

					    }
					 else
					 	{
					 		$('.stroke_na').prop('checked',true);
		    				$(".stroke").removeAttr("readonly"); 
						 	$('.stroke').val($('.post_stroke').val());
					 	}

					  //TUBERCULOSIS
					  if($('.post_tuberculosis').val() == 'NONE')
					    {
							$('.tuberculosis_na').prop('checked',false);
							$('.tuberculosis').val('');
		    				$(".tuberculosis").attr("readonly","true");   

					    }
					 else
					 	{
					 		$('.tuberculosis_na').prop('checked',true);
		    				$(".tuberculosis").removeAttr("readonly"); 
						 	$('.tuberculosis').val($('.post_tuberculosis').val());
					 	}
		   		}
	   		else
		   		{
		   			//patient information reset after uncheck
		   			$('.p_first_name').val('');
				 	$('.p_last_name').val('');
				 	$('.p_age').val('');
				 	$('.p_gender').val('');
				 	$('.patient_bracket_age').val('');
				 	$('.patient_classification').val('');

				 	//enable patient information fields upon uncheck of match caller
					$(".patient_classification").css({pointerEvents:"auto"}); 
					$(".patient_classification").css({"background-color":"#fff"}); 
					$(".p_first_name").removeAttr("readonly"); 		  
					$(".p_last_name").removeAttr("readonly");           
					$(".p_age").removeAttr("readonly");                 
					$(".p_gender").css({pointerEvents:"auto"}); 
					$(".p_gender").css({"background-color":"#fff"}); 


					//enable caller information fields upon uncheck of match caller
					$(".caller_classification").css({pointerEvents:"auto"});             
					$(".caller_classification").css({"background-color":"#fff"});            
					$(".age").removeAttr("readonly");              
					$(".gender").css({pointerEvents:"auto"}); 
					$(".gender").css({"background-color":"#fff"}); 


					//patient information reset after uncheck
		   			$('.p_first_name').val('');
				 	$('.p_last_name').val('');
				 	$('.p_age').val('');
				 	$('.p_gender').val('');
				 	$('.patient_bracket_age').val('');
				 	$('.patient_classification').val('');

				 	//enable patient information fields upon uncheck of match caller
					$(".patient_classification").css({pointerEvents:"auto"}); 
					$(".patient_classification").css({"background-color":"#fff"}); 
					$(".p_first_name").removeAttr("readonly"); 		  
					$(".p_last_name").removeAttr("readonly");           
					$(".p_age").removeAttr("readonly");                 
					$(".p_gender").css({pointerEvents:"auto"}); 
					$(".p_gender").css({"background-color":"#fff"}); 

					//enable caller information fields upon uncheck of match caller
					$(".caller_classification").css({pointerEvents:"auto"});             
					$(".caller_classification").css({"background-color":"#fff"});            
					$(".age").removeAttr("readonly");              
					$(".gender").css({pointerEvents:"auto"}); 
					$(".gender").css({"background-color":"#fff"}); 


					//VITALS
					//blood type
				 	$('.blood_type').val('');
				 	$('.blood_type_na').prop('checked',false);
	   				$(".blood_type").removeAttr("readonly");  
	
					//height
				 	$('.height').val('');
				 	$('.height_na').prop('checked',false);
	   				$(".height").removeAttr("readonly");  


				 	//blood pressure
				 	$('.blood_pressure').val('');
				 	$('.blood_pressure_na').prop('checked',false);
	   				$(".blood_pressure").removeAttr("readonly"); 
				 	
				 	//respiratory rate
				 	$('.respiratory_rate').val('');
				 	$('.respiratory_rate_na').prop('checked',false);
	   				$(".respiratory_rate").removeAttr("readonly");
				 	
				 	//rh
				 	$('.rh').val('');
				 	$('.rh_na').prop('checked',false);
	   				$(".rh").removeAttr("readonly");
				 	
				 	//weight
				 	$('.weight').val('');
				 	$('.weight_na').prop('checked',false);
	   				$(".weight").removeAttr("readonly");

				 	//pulse rate
				 	$('.pulse_rate').val('');
				 	$('.pulse_rate_na').prop('checked',false);
	   				$(".pulse_rate").removeAttr("readonly");
				 	
				 	//temperature
				 	$('.temperature').val('');
				 	$('.temperature_na').prop('checked',false);
	   				$(".temperature").removeAttr("readonly");

				 	//PAST MEDICAL HISTORY
				 	//allergies
				 	$('.allergies_na').prop('checked',false);
    				$(".allergies").attr("readonly","true");  
				 	$('.allergies').val('');

				 	//cancer
				 	$('.cancer_na').prop('checked',false);
    				$(".cancer").attr("readonly","true");  
				 	$('.cancer').val('');

				 	//operation
				 	$('.operation_na').prop('checked',false);
    				$(".operation").attr("readonly","true");  
				 	$('.operation').val('');

				 	//others
				 	$('.others_na').prop('checked',false);
    				$(".others").attr("readonly","true");  
				 	$('.others').val('');

				 	//asthma
				 	$('.asthma_na').prop('checked',false);
    				$(".asthma").attr("readonly","true");  
				 	$('.asthma').val('');

				 	//diabetes
				 	$('.diabetes_na').prop('checked',false);
    				$(".diabetes").attr("readonly","true");  
				 	$('.diabetes').val('');
					
					//heart attack
				 	$('.heart_attack_na').prop('checked',false);
    				$(".heart_attack").attr("readonly","true");  
				 	$('.heart_attack').val('');

				 	//hypertension
				 	$('.hypertension_na').prop('checked',false);
    				$(".hypertension").attr("readonly","true");  
				 	$('.hypertension').val('');

				 	//kidney_stones
				 	$('.kidney_stones_na').prop('checked',false);
    				$(".kidney_stones").attr("readonly","true");  
				 	$('.kidney_stones').val('');

				 	//lung_problem
				 	$('.lung_problem_na').prop('checked',false);
    				$(".lung_problem").attr("readonly","true");  
				 	$('.lung_problem').val('');

				 	//stroke
				 	$('.stroke_na').prop('checked',false);
    				$(".stroke").attr("readonly","true");  
				 	$('.stroke').val('');

				 	//tuberculosis
				 	$('.tuberculosis_na').prop('checked',false);
    				$(".tuberculosis").attr("readonly","true");  
				 	$('.tuberculosis').val('');
		   		}
});

//vital weight
$('.weight_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		//disable weight
		    		$(".weight").val('');
		    		$(".weight").attr("readonly","true");   
		    	}
		    else
		    	{
		    		$(".weight").removeAttr("readonly");
		    	}
	});

//vital height
$('.height_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		//disable weight
		    		$(".height").val('');
		    		$(".height").attr("readonly","true");   
		    	}
		    else
		    	{
		    		$(".height").removeAttr("readonly");
		    	}
	});

//vital blood type
$('.blood_type_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		//disable weight
		    		$(".blood_type").val('');
		    		$(".blood_type").attr("readonly","true");   
		    	}
		    else
		    	{
		    		$(".blood_type").removeAttr("readonly");
		    	}
	});

//vital blood pressure
$('.blood_pressure_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		//disable weight
		    		$(".blood_pressure").val('');
		    		$(".blood_pressure").attr("readonly","true");   
		    	}
		    else
		    	{
		    		$(".blood_pressure").removeAttr("readonly");
		    	}
	});

//vital pulse rate
$('.pulse_rate_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		//disable weight
		    		$(".pulse_rate").val('');
		    		$(".pulse_rate").attr("readonly","true");   
		    	}
		    else
		    	{
		    		$(".pulse_rate").removeAttr("readonly");
		    	}
	});

//vital respiratory rate
$('.respiratory_rate_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		//disable weight
		    		$(".respiratory_rate").val('');
		    		$(".respiratory_rate").attr("readonly","true");   
		    	}
		    else
		    	{
		    		$(".respiratory_rate").removeAttr("readonly");
		    	}
	});

//vital temperature
$('.temperature_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		//disable weight
		    		$(".temperature").val('');
		    		$(".temperature").attr("readonly","true");   
		    	}
		    else
		    	{
		    		$(".temperature").removeAttr("readonly");
		    	}
	});

//vital temperature
$('.rh_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		//disable weight
		    		$(".rh").val('');
		    		$(".rh").attr("readonly","true");   
		    	}
		    else
		    	{
		    		$(".rh").removeAttr("readonly");
		    	}
	});

//vital allergies
$('.allergies_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		
		    		$(".allergies").val('');
		    		$(".allergies").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".allergies").val('NONE');
		    		$(".allergies").attr("readonly","true");   
		    	}
	});

//vital allergies
$('.allergies_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".allergies").val('');
		    		$(".allergies").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".allergies").val('NONE');
		    		$(".allergies").attr("readonly","true");   
		    	}
	});

//vital cancer
$('.cancer_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".cancer").val('');
		    		$(".cancer").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".cancer").val('NONE');
		    		$(".cancer").attr("readonly","true");   
		    	}
	});

//vital operation
$('.operation_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".operation").val('');
		    		$(".operation").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".operation").val('NONE');
		    		$(".operation").attr("readonly","true");   
		    	}
	});

//vital others
$('.others_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".others").val('');
		    		$(".others").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".others").val('NONE');
		    		$(".others").attr("readonly","true");   
		    	}
	});

//asthma
$('.asthma_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".asthma").val('');
		    		$(".asthma").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".asthma").val('NONE');
		    		$(".asthma").attr("readonly","true");   
		    	}
	});

//diabetes
$('.diabetes_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".diabetes").val('');
		    		$(".diabetes").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".diabetes").val('NONE');
		    		$(".diabetes").attr("readonly","true");   
		    	}
	});

//heart_attack
$('.heart_attack_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".heart_attack").val('');
		    		$(".heart_attack").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".heart_attack").val('NONE');
		    		$(".heart_attack").attr("readonly","true");   
		    	}
	});

//hypertension
$('.hypertension_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".hypertension").val('');
		    		$(".hypertension").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".hypertension").val('NONE');
		    		$(".hypertension").attr("readonly","true");   
		    	}
	});

//kidney_stones
$('.kidney_stones_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".kidney_stones").val('');
		    		$(".kidney_stones").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".kidney_stones").val('NONE');
		    		$(".kidney_stones").attr("readonly","true");   
		    	}
	});

//lung_problem
$('.lung_problem_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".lung_problem").val('');
		    		$(".lung_problem").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".lung_problem").val('NONE');
		    		$(".lung_problem").attr("readonly","true");   
		    	}
	});

//stroke
$('.stroke_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".stroke").val('');
		    		$(".stroke").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".stroke").val('NONE');
		    		$(".stroke").attr("readonly","true");   
		    	}
	});

//tuberculosis
$('.tuberculosis_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".tuberculosis").val('');
		    		$(".tuberculosis").removeAttr("readonly");
		    	}
		    else
		    	{
		    		$(".tuberculosis").val('NONE');
		    		$(".tuberculosis").attr("readonly","true");   
		    	}
	});

//email address
$('.email_address_na').change(function()
    {
	    	if ($(this).is(':checked')) 
		    	{
		    		$(".email_address").val('NONE');
		    		$(".email_address").attr("readonly","true");   
		    	}
		    else
		    	{
		    		$(".email_address").val('');
		    		$(".email_address").removeAttr("readonly");
		    	}
	});


//on change caller bracket age
$('.age').change(function(){
	var caller_age = $('.age').val();

	if(caller_age >=0 && caller_age <= 17)
		{
			$('.caller_bracket_age').val('0-17');
		}
	else if(caller_age >=18 && caller_age <= 25)
		{
			$('.caller_bracket_age').val('18-25');
		}
	else if(caller_age >=26 && caller_age <= 30)
		{
			$('.caller_bracket_age').val('26-30');
		}
	else if(caller_age >=31 && caller_age <= 35)
		{
			$('.caller_bracket_age').val('31-35');
		}
	else if(caller_age >=36 && caller_age <= 40)
		{
			$('.caller_bracket_age').val('36-40');
		}
	else if(caller_age >=41 && caller_age <= 45)
		{
			$('.caller_bracket_age').val('41-45');
		}
	else if(caller_age >=46 && caller_age <= 50)
		{
			$('.caller_bracket_age').val('46-50');
		}
	else if(caller_age >=51 && caller_age <= 55)
		{
			$('.caller_bracket_age').val('51-55');
		}
	else if(caller_age >=56 && caller_age <= 60)
		{
			$('.caller_bracket_age').val('56-60');
		}
	else if(caller_age >=61 && caller_age <= 65)
		{
			$('.caller_bracket_age').val('61-65');
		}
	else if(caller_age >=66 && caller_age <= 70)
		{
			$('.caller_bracket_age').val('66-70');
		}
	else if(caller_age >=71 && caller_age <= 75)
		{
			$('.caller_bracket_age').val('71-75');
		}
	else if(caller_age >=76 && caller_age <= 80)
		{
			$('.caller_bracket_age').val('76-80');
		}
	else if(caller_age >=81 && caller_age <= 90)
		{
			$('.caller_bracket_age').val('81-90');
		}
	else if(caller_age >=91 && caller_age <= 100)
		{
			$('.caller_bracket_age').val('91-100');
		}
	else
		{
			$('.caller_bracket_age').val('101-ABOVE');
		}
});

//on change patient bracket age
$('.p_age').change(function(){
	var patient_age = $('.p_age').val();

	if(patient_age >=0 && patient_age <= 17)
		{
			$('.patient_bracket_age').val('0-17');
		}
	else if(patient_age >=18 && patient_age <= 25)
		{
			$('.patient_bracket_age').val('18-25');
		}
	else if(patient_age >=26 && patient_age <= 30)
		{
			$('.patient_bracket_age').val('26-30');
		}
	else if(patient_age >=31 && patient_age <= 35)
		{
			$('.patient_bracket_age').val('31-35');
		}
	else if(patient_age >=36 && patient_age <= 40)
		{
			$('.patient_bracket_age').val('36-40');
		}
	else if(patient_age >=41 && patient_age <= 45)
		{
			$('.patient_bracket_age').val('41-45');
		}
	else if(patient_age >=46 && patient_age <= 50)
		{
			$('.patient_bracket_age').val('46-50');
		}
	else if(patient_age >=51 && patient_age <= 55)
		{
			$('.patient_bracket_age').val('51-55');
		}
	else if(patient_age >=56 && patient_age <= 60)
		{
			$('.patient_bracket_age').val('56-60');
		}
	else if(patient_age >=61 && patient_age <= 65)
		{
			$('.patient_bracket_age').val('61-65');
		}
	else if(patient_age >=66 && patient_age <= 70)
		{
			$('.patient_bracket_age').val('66-70');
		}
	else if(patient_age >=71 && patient_age <= 75)
		{
			$('.patient_bracket_age').val('71-75');
		}
	else if(patient_age >=76 && patient_age <= 80)
		{
			$('.patient_bracket_age').val('76-80');
		}
	else if(patient_age >=81 && patient_age <= 90)
		{
			$('.patient_bracket_age').val('81-90');
		}
	else if(patient_age >=91 && patient_age <= 100)
		{
			$('.patient_bracket_age').val('91-100');
		}
	else
		{
			$('.patient_bracket_age').val('101-ABOVE');
		}

});

//employee get shift
$('.ctime').ready(function(){
	var ctime = $('.ctime').val();

	if(ctime >= '07:01 AM' && ctime <= '03:00 PM')
		{
			$('#shift').val('PM');	
		}
	else
		{
			$('#shift').val('AM');	
		}
});


//YES/NO Radio diseases
$('input:radio[name="disease_type"]').change(
    function(){
        if ($(this).is(':checked') && $(this).val() == 'NON COMMUNICABLE') {
        	$(".diseases").attr("disabled","false");
        	$(".diseases").val('');
        }
        else
        {
        	$(".diseases").removeAttr("disabled");
        }
    });

//>> for Modal Summary
//caller_name
	$('a.summary').on('click',function(){
		$('.sum_caller_name').val(name);
	});

//reason of call
$('.reason_of_call').change(function(){

	var reason_of_call = $('.reason_of_call').val();

	$('.sum_called_in_sick').val(reason_of_call);

});

//is name
$('.is_name').change(function(){

	var is_name = $('.is_name').val();

	$('.sum_is_name').val(is_name);
});

//disease type
$('.disease_type').change(function(){

	var disease_type = $('.disease_type').val();

	$('.sum_disease_type').val(disease_type);
});

//diseases
$('.diseases').change(function(){

	var diseases = $('.diseases').val();

	$('.sum_disease').val(diseases);
});

//presumptive diagnosis
$('.presumptive_diagnosis').change(function(){

	var presumptive_diagnosis = $('.presumptive_diagnosis').val();

	$('.sum_presumptive_diagnosis').val(presumptive_diagnosis);
});

//secondary diagnosis
$('.secondary_diagnosis').change(function(){

	var secondary_diagnosis = $('.secondary_diagnosis').val();

	$('.sum_secondary_diagnosis').val(secondary_diagnosis);
});

//notes
$('.notes').change(function(){

	var notes = $('.notes').val();

	$('.sum_notes').val(notes);
});

//from modal med record upon select of member no
if($('.sales_program').val() == 'PILOT SUTHERLAND'){
			$(".reason_of_call").removeAttr("disabled");
			$(".is_name").removeAttr("disabled");
			$(".disease_type").removeAttr("disabled");
			$(".diseases").removeAttr("disabled");
			
		}
	else{
			$(".reason_of_call").attr("disabled","false");
			$(".is_name").attr("disabled","false");
			$(".disease_type").attr("disabled","false");
			$(".diseases").attr("disabled","false");
}

$('.is_name').change(function(){
	$.ajax({
			//reference
			url: 'table/_tbl_is_feature.php',
			type: 'GET',
			//$_GET['is_name']
			data: {is_name: $(".is_name").val()},
			//if query success
			success: function(output){
				//	
				$('#is_feature_2').html(output)
			}
		})
});

//get caller number
$('#get_number').click(function(){
	$('.disclaimer').prop('checked',false);
	$('[name="sms_message"]').val('');
	$('[name="sms_caller_no"]').val($('[name="caller_no"]').val());
	$('[name=disclaimer]').prop('checked',true);

});

</script>
</body>
</html>

