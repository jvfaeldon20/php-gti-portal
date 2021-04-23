<?php 
	if($_COOKIE['username']=='')
		{
			header("location: login.php");
		}
?>
<!DOCTYPE html>
<html>
<head>
	<title>GTI | Survey</title>
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../../css/survey.css">
    <link rel="stylesheet" type="text/css" href="../../css/main.css">
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
 		$stmt = 'SELECT  survey_id AS countsurvey FROM survey ORDER BY survey_id DESC LIMIT 1';
 		$result = mysqli_query($db_conn,$stmt);

 		if(mysqli_num_rows($result)>0)
 			{
 				while($row = mysqli_fetch_array($result))
 					{
	 ?>
		<form class="form-inline" method="POST" id="submit" action="add_survey.php">
			<div class="container">
				<div class="row">
				<?php
			 		if (isset($_GET['create'])){
						if($_GET['create'] == 'ok'){
							echo"<div class = 'alert alert-success'><span class='glyphicon glyphicon-ok'></span>&nbsp&nbsp&nbspRecord successfully saved! &nbsp&nbsp&nbsp<strong>Transaction No:&nbsp&nbsp".$row['countsurvey']."</strong></div>";
						}
						else{
							echo"<div class='alert alert-danger'><span class='glyphicon glyphicon-remove'></span>&nbsp&nbsp&nbspRecord saving failed!</div>";
						}
				}
			 	?>
				</div>
				<div class="row">
					<div class="col-md-4">
						<label class="no-border-radius pull-left label-survey">WR NAME:</label>
						<strong>
							<label type="text" class="no-border-radius svy_wellness_name pull-left" ><?php echo $_COOKIE['first_name'].' '.$_COOKIE['last_name']; ?></label>
						</strong>
					</div>
					<div class="col-md-8">
						<a href="#" class="btn btn-survey no-border-radius pull-right" title="Conduct a Survey"  data-toggle="modal" data-target="#modal_survey">
							<i class="glyphicon glyphicon-tasks"></i>
						</a>
					</div>
				</div>
				<div class="row survey-info "><br>	
					<div class="col-md-6">
						<p>CALLER NO:</p>
					</div>
					<div class="col-md-6 pull-right">
						<p>DOCTOR:</p>
					</div>
				</div>
			</div>
	</form>
	<?php }} ?>
</body>
</html>

<?php include 'modal/_modal_survey.php'; ?>

