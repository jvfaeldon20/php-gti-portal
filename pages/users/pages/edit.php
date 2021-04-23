<!DOCTYPE html>
<html>
<head>
	<title>Users | Update</title>
	<script type="text/javascript" src="../../../js/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="../../../js/bootstrap.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../../css/users.css">
	<link rel="stylesheet" type="text/css" href="../../../css/main.css">
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
                            <img src="../../../img/main/header-logo/gti_edit_users.png" class="gti-logo">
                        </a>
                    </div>
                </div>
            </nav>
        </div>
    </div>
	<div class="container">
		<?php 
			include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';
			$id = $_GET['id'];
			$stmt = "SELECT * FROM users WHERE user_id = $id";
			$query = mysqli_query($db_conn,$stmt);

			while($row = mysqli_fetch_assoc($query)){


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
		<form  class="form" method="POST" action="_update.php">
	    	<div class="container">
				<div class="row">
					<div class="col-lg-3">
						<img  src="<?php echo $row['picture_path']; ?>" class="thumbnail" name="picture_path">
					</div>
					<div class="col-lg-9 margin-right">
						<div class="col-lg-6">
							<input type="hidden" name="user_id" class="form-control" value="<?php echo $row['user_id']; ?>" required>
							<label type="text" class="label-min-width label-users">Username</label>
								<input type="text" name="username" class="form-control input-users" value="<?php echo $row['username']; ?>" readonly="readonly" required>
							<label type="text" class="label-min-width label-users">First Name</label>
								<input type="text" name="first_name" class="form-control input-users" value="<?php echo $row['first_name']; ?>" required>
							<label type="text" class="label-min-width label-users">Last Name</label>
								<input type="text" name="last_name" class="form-control input-users" value="<?php echo $row['last_name']; ?>" required>
							<label type="text" class="label-min-width label-users">Birthdate</label>
								<input type="text" name="birthdate" class="form-control input-users" value="<?php echo $row['birthdate']; ?>" required>
						</div>
						<div class="col-lg-6">
							<label type="text" class="label-min-width-3 label-users">E-mail Address</label>
								<input type="email" name="email" class="form-control input-users no-border-radius" value="<?php echo $row['email']; ?>" required>
							<label type="text" class="label-min-width-3 label-users">Role</label>
								<select type="text" name="role" class="form-control input-users" value="<?php echo $row['role']; ?>">
									<option class="form-control" value="ADMIN">ADMIN</option>
									<option class="form-control" value="DOCTOR">DOCTOR</option>
									<option class="form-control" value="HEALTHSTOP">HEALTHSTOP</option>
									<option class="form-control" value="HR">HR</option>
									<option class="form-control" value="WELLNESS">WELLNESS</option>
								</select>
							<label type="text" class="label-min-width-3 label-users">Status</label>
								<select type="text" name="status" class="form-control input-users" value="<?php echo $row['status']; ?>">
									<option class="form-control">ACTIVE</option>
									<option class="form-control">INACTIVE</option>
								</select>
						</div>
					</div><br>
				</div>
					<input type="submit" class="btn btn-user no-border-radius pull-right btn-margin" value="Save">
					<a href="../index.php" class="btn btn-user no-border-radius pull-right btn-margin">Back</a>
	    	</div>
		</form> 
	<?php } ?>
	</div>
</body>
</html>