<!DOCTYPE html>
<html>
<head>
	<title>Users | Index</title>
	<script type="text/javascript" src="../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../css/main.css">
	<link rel="stylesheet" type="text/css" href="../../css/users.css">
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
                            <img src="../../img/main/header-logo/gti_manage_users.png" class="gti-logo">
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
	<div class="container">
	<?php
		if (isset($_GET['create']))
			{
				if ($_GET['create'] == 'ok')
					{
						echo "<div class='alert alert-success'>Record created successfully!</div>";
					}
				else
					{
						echo "<div class='alert alert-danger'>Record creating failed!</div>";
					}
			}
		if (isset($_GET['update']))
			{
				if ($_GET['update'] == 'ok')
					{
						echo "<div class='alert alert-success'>Record updated successfully!</div>";
					}
				else 
					{
						echo "<div class='alert alert-danger'>Record Updating failed!</div>";
					}
			}
		if (isset($_GET['delete']))
			{
				if ($_GET['delete'] == 'ok')
					{
						echo "<div class='alert alert-success'>Record deleted successfully!</div>";
					}
				else
					{
						echo "<div class='alert alert-danger'>Record deletion failed!</div>";
					}
			}
	?>
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
                          $link_doctor = "../main/doctor.php";
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
	  <a href="#" class="btn btn-user no-border-radius pull-right" data-toggle="modal" data-target="#modal_new"><span class="glyphicon glyphicon-plus"></span>&nbsp&nbsp&nbspNEW USER</a><br>
	  <table class="table table-bordered table-sm table-hover table-margin">
	  	<thead>
	  		<tr>
	  			<th class="header-users">NO</th>
	  			<th class="header-users">USERNAME</th>
	  			<th class="header-users">FIRST NAME</th>
	  			<th class="header-users">LAST NAME</th>
	  			<th class="header-users">BIRTHDATE</th>
	  			<th class="header-users">EMAIL</th>
	  			<th class="header-users">ROLE</th>
	  			<th class="header-users">PICTURE PATH</th>
	  			<th class="header-users">STATUS</th>
	  			<th class="header-users mid" colspan="2">ACTION</th>
	  		</tr>
	  	</thead>
	  	<tbody>
	  		<?php include 'table/_table.php'; ?>
	  	</tbody>
	  </table>	
	</div>
	<?php include 'modal/_modal.php'; ?>
</body>
</html>