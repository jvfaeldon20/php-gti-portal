<?php
	include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Survey | Transaction</title>
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
    <link rel="stylesheet" type="text/css" href="../../css/survey.css">
</head>
<body>
	<div class="container-fluid">
        <div class="row">
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
                            <img src="../../img/main/header-logo/gti_survey.png" class="gti-logo">
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
     <div class="container">
	 	<!--NAVIGATION-->
        <div class="row navbar-border">
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
	<?php
		include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

		$output = '';
		$stmt   = "SELECT * FROM record WHERE record_id = ".$_GET["survey_id"]." ";
		$result = mysqli_query($db_conn,$stmt);

		if(mysqli_num_rows($result)>0)
			{
			while($row = mysqli_fetch_array($result))
				{
	?>
		<form class="form-inline" method="POST" id="submit" action="add_survey.php">
			<div class="container fill">
				<!--SURVEY HEADER-->
				<div class="row">
					<div class="col-md-4">
						<label class="no-border-radius pull-left label-survey">WR NAME:</label>
						<strong>
							<label type="text" class="no-border-radius svy_wellness_name pull-left" ><?php echo $_COOKIE['first_name'].' '.$_COOKIE['last_name']; ?>
							</label>
						</strong>
					</div>
					<div class="col-md-8">
						<a href="#" class="btn btn-survey no-border-radius pull-right" title="Conduct a Survey"  data-toggle="modal" data-target="#modal_survey">
							<i class="glyphicon glyphicon-tasks"></i>
						</a>
					</div>
				</div>
				<div class="row survey-info"><br>	
					<div class="col-md-6">
						<p>CALLER NO:&nbsp&nbsp<input type="text" name="svy_caller_no" value="<?php echo $row['caller_no'];?>"></p>
					</div>
					<div class="col-md-6 pull-right">
						<p>DOCTOR:&nbsp&nbsp<input type="text" name="svy_doctor_name" value="<?php echo $row['doctor_name'] ?>"></p>
					</div>
				</div>
				<div class="row">
					<div class="col-md-11"></div>
					<div class="col-md-1 pull-right">
						<select name="svy_remarks1" placeholder="Remarks" class="form-control language2" id="language2" required>
							<option value="ENGLISH">EN</option>
							<option value="FILIPINO">FIL</option>
						</select>	
					</div>
				</div><br><br>
				<!--END OF SURVEY HEADER-->
				<!--SURVEY ENG/FIl-->
				<div class="row">
					<div class="col-md-12 survey-question">
						<p class="english">
							Hello good morning/afternoon/evening! My name is from KonsultaMD. Our records show that you have recently used our service. We would like to hear from you on how we can better our service. Are you free for a short 3-question survey?
						</p>
					</div>
					<div class="col-md-12 survey-question">
						<p class="filipino">
							Hello good morning/afternoon/evening! My name is from KonsultaMD. Ayon po sa aming records, kayo po ay gumamit ng aming serbisyo kamakailan lamang. Nais po sana naming malaman mula sa inyo kung papaano naming higit na mapapaganda ang aming serbisyo. Kayo po ba ay may oras para sa 3 katanungan?
						</p>
					</div>
					<div class="col-md-12 survey-display">
						<p class="english">
							Thank you, Mr./Mrs. [Name] for picking up the call. We completely understand. Have a nice day.”
						</p>
					</div>
					<div class="col-md-12 survey-display">
						<p class="filipino">
							Naiintindihan po namin, maraming salamat Mr./Mrs.[Name] sa pagsagot ng aming tawag. Magandang araw po.
						</p>
					</div>
				</div><br>
				<div class="row">
					<div class="radio" id="option">
						<label class="radio-inline"><input type="radio" name="svy_survey1" class="checkmark" id="option_yes" value="YES" required>YES</label>
						<label class="radio-inline"><input type="radio" name="svy_survey1" class="checkmark" id="option_no" value="NO" required>NO</label>
					</div>
				</div><br>
				<!--END SURVEY ENG/FIl-->
				<!--SURVEY QUESTION 1-->
				<div class="row">
					<div class="col-md-12 survey-question survey2">
						<p class="english">
							From a scale of 0 to 10 with 10 being the highest satisfaction and 0 being the lowest level of satisfaction, please rate your experience with the way the doctor handled your recent consultation.
						</p>
						<p class="filipino">
							Mula 0 hanggang 10 kung saan 10 ang  pinakamataas at 0 ang pinakamababa, maari nyo po bang i-ranggo ang inyong naging karanasan sa kung paano ang pagasikaso at pagsagot ng Duktor?

						</p>
					</div>
				</div><br>
				<div class="row" id="option2">
					<div class="col-lg-12">
						<label class="radio-inline survey2"><input type="radio" name="svy_survey2" class="checkmark rem2_det" value="1" required>1</label>
						<label class="radio-inline survey2"><input type="radio" name="svy_survey2" class="checkmark rem2_det" value="2" required>2</label>
						<label class="radio-inline survey2"><input type="radio" name="svy_survey2" class="checkmark rem2_det" value="3" required>3</label>
						<label class="radio-inline survey2"><input type="radio" name="svy_survey2" class="checkmark rem2_det" value="4" required>4</label>
						<label class="radio-inline survey2"><input type="radio" name="svy_survey2" class="checkmark rem2_det" value="5" required>5</label>
						<label class="radio-inline survey2"><input type="radio" name="svy_survey2" class="checkmark rem2_det" value="6" required>6</label>
						<label class="radio-inline survey2"><input type="radio" name="svy_survey2" class="checkmark rem2_neu" value="7" required>7</label>
						<label class="radio-inline survey2"><input type="radio" name="svy_survey2" class="checkmark rem2_neu" value="8" required>8</label>
						<label class="radio-inline survey2"><input type="radio" name="svy_survey2" class="checkmark rem2_pro" value="9" required>9</label>
						<label class="radio-inline survey2"><input type="radio" name="svy_survey2" class="checkmark rem2_pro" value="10" required>10</label>
					</div>
				</div><br>
				<!--END OF SURVEY QUESTION 1-->
				<!--SURVEY QUESTION 2-->
				<div class="row">
					<div class="col-md-12 survey-question survey3">
						<p class="english">
							Based on your overall experience, please rate how likely are you to recommend KonsultaMD to your family or friends from 0 to 10 with 10 being extremely likely and 0 being not at all likely
						</p>
						<p class="filipino">
							Mula 0 hanggang 10 kung saan 10 ang  pinakamataas at 0 ang pinakamababa, gaano po kataas ang posibilidad na inyong irerekominda sa inyong pamilya o kaibigan ang KonsulaMD ayon sa inyong naging  karanasan?
						</p>
					</div>
				</div><br>
				<div class="row" id="option3">
					<div class="col-lg-12">
						<label class="radio-inline survey3"><input type="radio" name="svy_survey3" class="checkmark rem3_det" value="1" required>1</label>
						<label class="radio-inline survey3"><input type="radio" name="svy_survey3" class="checkmark rem3_det" value="2" required>2</label>
						<label class="radio-inline survey3"><input type="radio" name="svy_survey3" class="checkmark rem3_det" value="3" required>3</label>
						<label class="radio-inline survey3"><input type="radio" name="svy_survey3" class="checkmark rem3_det" value="4" required>4</label>
						<label class="radio-inline survey3"><input type="radio" name="svy_survey3" class="checkmark rem3_det" value="5" required>5</label>
						<label class="radio-inline survey3"><input type="radio" name="svy_survey3" class="checkmark rem3_det" value="6" required>6</label>
						<label class="radio-inline survey3"><input type="radio" name="svy_survey3" class="checkmark rem3_neu" value="7" required>7</label>
						<label class="radio-inline survey3"><input type="radio" name="svy_survey3" class="checkmark rem3_neu" value="8" required>8</label>
						<label class="radio-inline survey3"><input type="radio" name="svy_survey3" class="checkmark rem3_pro" value="9" required>9</label>
						<label class="radio-inline survey3"><input type="radio" name="svy_survey3" class="checkmark rem3_pro" value="10" required>10</label>
					</div>
				</div><br>
				<!--END OF SURVEY QUESTION 2-->
				<!--SURVEY QUESTION 3-->
				<div class="row" class="comment">
					<div class="col-md-12 survey-question survey4">
						<p class="english">
							Finally, Is there anything we can do to further improve our service?
						</p>
						<p class="filipino">
							Bilang panghuling katanungan, ano po sa inyong palagay ang maari pa naming gawin upang higit na mapaganda ang aming serbisyo?
						</p>
					</div>
				</div><br>
				<div class="row">
					<textarea type="text" class="form-control" name="svy_comment" id="svy_comment" required></textarea>
				</div><br>
				<!--END OF SURVEY QUESTION 3-->
				<div class="row">
						<div class="col-md-6">
						</div>
						<div class="col-md-6">
							<a href="void_survey.php?survey_id=<?php echo $row['record_id'];  ?>" id="reset" class="btn no-border-radius btn-survey pull-right reset" data-toggle="tooltip" title="SAVE">
								SAVE
							</a>
							<input type="submit" class="btn no-border-radius btn-survey pull-right" data-toggle="tooltip" title="SAVE" value="SAVE" id="save"> 
						</div>
						<!--HIDDEN INPUTS-->
						<input type="hidden" class="form-control" name="svy_municipality" value="<?php echo $row['municipality'] ?>">
						<input type="hidden" class="form-control" name="svy_province" 	  value="<?php echo $row['province'] ?>">
						<input type="hidden" class="form-control" name="svy_region" 	  value="<?php echo $row['region'] ?>">
						<input type="hidden" class="form-control" name="svy_country" 	  value="<?php echo $row['country'] ?>">
						<input type="hidden" class="form-control" name="svy_caller_age"   value="<?php echo $row['age'] ?>">
						<input type="hidden" class="form-control" name="svy_gender"       value="<?php echo $row['gender'] ?>">
						<input type="hidden" class="form-control" name="svy_remarks1"     value="survey remarks 1" id="svy_remarks1">
						<input type="hidden" class="form-control" name="svy_remarks2" 	  value="survey remarks 2" id="svy_remarks2">
						<input type="hidden" class="form-control" name="svy_survey_id" 	  value="<?php echo $_GET['survey_id'] ?>">
						<input type="hidden" class="form-control" name="svy_wellness" 	  value="<?php echo $_COOKIE['first_name'].' '.$_COOKIE['last_name']; ?>">
				</div><br>
			</div>
		</div>
	</form>
 <?php }} ?>
</body>
</html>
<?php include 'modal/_modal_survey.php'; ?>
<script>
//tooltip
	$(document).ready(function(){


    $('[data-toggle="tooltip"]').tooltip();
    $('.filipino').hide();
    $('.survey-display').hide();
    $('.reset').hide();
    

	});

//on keypress to UPPER CASE
$("textarea[type=text]").keyup(function(){
	$(this).val($(this).val().toUpperCase());
});

//collapse
$("#language2").change(function(){
	debugger;
	var language = $("#language2").val();

	if (language == "ENGLISH")
		{
			$(".filipino").hide('slow',function(){
				$(".english").show('fast');
			});	
		}
	else
		{
			$(".filipino").show('slow',function(){
				$(".english").hide();
			});

		}

});

//option
$('#option').click(function(){
	if ($('#option_no').is(':checked'))
	{
		
		$('.survey2').hide();
		$('.survey3').hide();
		$('.comment').hide();
		$('.survey-question').hide();
		$('.survey-display').show();
		$('#svy_comment').hide();

		$('.reset').show();
		$('input[type=submit]').hide();

		
	}else if ($('#option_yes').is(':checked'))
	{
		$('.survey2').show();
		$('.survey3').show();
		$('.comment').show();
		$('.survey-question').show();
		$('.survey-display').hide();
		$('#svy_comment').show();

		$('input[type=submit]').show();
		$('.reset').hide();
	}
 	else{}
});


//survey remarks 1
$('#option2').click(function() {
   if($('.rem2_det').is(':checked')) 
   	{
   		$('#svy_remarks1').val('DETRACTORS');
   	}
   else if($('.rem2_neu').is(':checked')) 
   	{
   		$('#svy_remarks1').val('NEUTRAL');
   	}
   else if($('.rem2_pro').is(':checked')) 
   	{
   		$('#svy_remarks1').val('PROMOTER');
   	}
   else{}
});


//survey remarks 2
$('#option3').click(function() {
   if($('.rem3_det').is(':checked')) 
   	{
   		$('#svy_remarks2').val('DETRACTORS');
   	}
   else if($('.rem3_neu').is(':checked')) 
   	{
   		$('#svy_remarks2').val('NEUTRAL');
   	}
   else if($('.rem3_pro').is(':checked')) 
   	{
   		$('#svy_remarks2').val('PROMOTER');
   	}
   else{}
});

$("#reset").click(function(){
	alert('Record Initialize: Caller no set to DECLINED!');
});

</script>

