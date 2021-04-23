<?php
  include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';
  if($_COOKIE['username'] == '')
    {
      header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GTI | Main</title>
    <script type="text/javascript" src="../js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
</head>
<body background="img\login\bg-image.jpg" class="bg-cover">
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
                            <img src="../img/main/header-logo/gti_home.png" class="gti-logo">
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
                          $link_corporate = "main/corporate.php";
                        }
                      else
                        {
                          $link_corporate = "javascript:void()";
                        }
                    ?>
                    <li><a href="<?php echo $link_corporate; ?>" data-toggle="tooltip" title="Corporate">CORPORATE</a></li>
                    <!--END OF CORPORATE-->

                    <!--WELLNESS-->
                    <?php
                      $link_wellness = '';

                      if($_COOKIE['role'] == 'WELLNESS')
                        {
                          $link_wellness = "main/wellness.php";
                        }
                      elseif($_COOKIE['role'] == 'ADMIN')
                        {
                          $link_wellness = "main/wellness.php";
                        }
                      else
                        {
                          $link_wellness = "javascript:void()";
                        }
                    ?>
                    <li><a href="<?php echo $link_wellness; ?>" data-toggle="tooltip" title="Wellness">WELLNESS</a></li>
                    <!--END OF WELLNESS-->

                    <!--DOCTOR-->
                    <?php
                      $link_doctor = '';

                      if($_COOKIE['role'] == 'DOCTOR')
                        {
                          $link_doctor = "main/doctor.php";
                        }
                      elseif($_COOKIE['role'] == 'ADMIN')
                        {
                          $link_doctor = "main/doctor.php";
                        }
                      else
                        {
                          $link_doctor = "javascript:void()";
                        }
                    ?>
                    <li><a href="<?php echo $link_doctor; ?>" data-toggle="tooltip" title="Doctor">DOCTOR</a></li>
                    <!--END OF DOCTOR-->

                    <!--MANAGEMENT-->
                    <?php
                      $link_doctor = '';

                      if($_COOKIE['role'] == 'ADMIN')
                        {
                          $link_doctor = "main/management.php";
                        }
                      else
                        {
                          $link_doctor = "javascript:void()";
                        }
                    ?>
                    <li><a href="main/management.php" data-toggle="tooltip" title="Management">MANAGEMENT</a></li>
                    <!--END OF MANAGEMENT-->

                </ul>
                <div class="dropdown">
                    <button class="btn btn-img dropdown-toggle pull-right" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <label class="nav-user-name"><?php echo $_COOKIE['first_name'].' '.$_COOKIE['last_name']; ?></label>
                        <img src="<?php echo 'users'.$_COOKIE['picture_path']; ?>" class="user-img">
                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu pull-right logout" >
                        <li>
                             <!--MANAGEMENT-->
                              <?php
                                $link_mngt = '';

                                if($_COOKIE['role'] == 'ADMIN')
                                  {
                                    $link_mngt = "users/index.php";
                                  }
                                else
                                  {
                                    $link_mngt = "javascript:void()";
                                  }
                              ?>
                             <a href="<?php echo $link_mngt; ?>">
                                <i class="glyphicon glyphicon-cog"></i>&nbsp&nbspManagement
                            </a>
                            <a href="../logout.php">
                                <i class="glyphicon glyphicon-log-out"></i>&nbsp&nbspLog out
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    <!--END OF NAVIGATION-->
        <div class="row">
            <div class="col-lg-9">
                <!--slider-->
                <div class="row">
                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="../img/main/slider/d.jpg" class="slider">
                            </div>
                            <?php 
                              $stmt_slider  = "SELECT * FROM slider";
                              $query_slider =  $db_conn -> query($stmt_slider);
                                while($row  = $query_slider -> fetch_assoc())
                                 {
                            ?>
                            <div class="item">
                                <img src="<?php echo $row['slider']; ?>" class="slider">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <!--end slider-->
                <div class="row hdr">
                    <div class="well well-sm header">
                        <label class="header-caption">What's happening in Global Telehealth Inc.?</label>
                    </div>
                </div>
                <!--publish-->
                <?php
                   $date_now   = date('Y-m-d');
                   $date_30days = date('Y-m-d',strtotime('-30 days'));  
                  //publish - left

                   $stmt_publish = "SELECT * FROM publish WHERE pub_type !=  'IT BULLETIN' and pub_date BETWEEN '".$date_30days."' AND '".$date_now."'";
                   $query_publish = $db_conn -> query($stmt_publish);
                   while($row  = $query_publish -> fetch_assoc())
                    {
                      
                  ?>
                <div class="row pub-mrg">
                    <div class="col-md-3">
                      <div class="media-left media-middle">
                        <img src="<?php echo $row['pub_image']; ?>" style="height: 100px; width: 200px;">
                      </div> 
                    </div> 
                    <div class="col-md-9">
                        <div class="media-body content-container">
                               <h4 class="media-heading"> 
                                   <?php echo $row['pub_title']; ?>
                               </h4>
                              <input type="checkbox" class="read-more-state" id="<?php echo $row['publish_id']; ?>"/>
                                 <p class="content-body">
                                        <?php echo substr($row['pub_description'],0,200); ?>
                                     <span class="read-more-target">
                                        <?php echo substr($row['pub_description'],200,1000); ?>
                                    </span>
                                </p>
                              <label for="<?php echo $row['publish_id'];?>" class="read-more-trigger pull-right"></label>
                              <label class="pull-left">
                                  <h5>
                                    Published by:&nbsp
                                      <strong class="publisher">
                                        <?php echo $row['pub_first_name'].' '.$row['pub_last_name']; ?>  
                                      </strong>
                                    &nbsp|&nbspDate Posted:&nbsp
                                      <strong class="publisher">
                                        <?php echo $row['pub_date']; ?>
                                      </strong>
                                  </h5>
                              </label>
                          </div>
                    </div>
                </div><hr>
                <?php } ?>
                <!--end publish-->
            </div>
            <div class="col-lg-3">
                <!--system links-->
                <div class="row">
                    <div class="well well-sm header">
                        <label class="header-caption">SYSTEM LINKS</label>
                    </div>
                    <div class="linkrow-1">
                        <center>
                            <a target="_blank" href='http://172.16.100.5/css.konsultamd/Seguridad/frmLoginApp.aspx' class="btn-link" data-toggle="tooltip" title="Customer Service System"><i class="glyphicon glyphicon-earphone"></i></a>
                            <a target="_blank" href='http://172.16.100.5/camt.konsultamd/' class="btn-link" data-toggle="tooltip" title="Healthcare Call Center"><i class="glyphicon glyphicon-briefcase"></i></a>
                            <a target="_blank" href='http://172.16.100.5/sales.konsultamd/Home/Login' class="btn-link" data-toggle="tooltip" title="Sales System"><i class="glyphicon glyphicon-stats"></i></a>
                            <a target="_blank" href='http://gtivicidial/vicidial/welcome.php' class="btn-link" data-toggle="tooltip" title="Vicidial"><i class="glyphicon glyphicon-phone-alt"></i></a>
                        </center>
                    </div>
                    <div class="linkrow-2">
                        <!--LINK SURVEY-->
                        <?php 
                            $link_survey = '';

                            if($_COOKIE['role'] == 'WELLNESS')
                              {
                                $link_survey = "survey/survey.php";
                              }
                            elseif($_COOKIE['role'] == 'ADMIN')
                              {
                                $link_survey = "survey/survey.php";
                              }
                            else
                              {
                                $link_survey = "javascript:void()";
                              }
                        ?>
                            <a href="<?php echo $link_survey; ?>" class="btn-link-2 indent" data-toggle="tooltip" title="Survey">SURVEY</a>
                        <!--END OF LINK SURVEY-->

                         <!--LINK EMR-->
                        <?php 
                            $link_emr = '';

                            if($_COOKIE['role'] == 'DOCTOR')
                              {
                                $link_emr = "emr/index.php";
                              }
                            elseif($_COOKIE['role'] == 'ADMIN')
                              {
                                $link_emr = "emr/index.php";
                              }
                            else
                              {
                                $link_emr = "javascript:void()";
                              }
                        ?>
                            <a href="<?php echo $link_emr; ?>" class="btn-link-2" data-toggle="tooltip" title="Electronic Medical Records">EMR</a>
                        <!--END OF LINK EMR-->

                        <!--LINK OF EAPPS-->
                            <a href="#" class="btn-link-2" data-toggle="tooltip" title="EAPPS">EAPPS</a>
                        <!--END OF LINK EAPPS-->
                    </div>
                </div>
                <!--end system links-->
                <!--birthday-->
                <div class="row row-bday">
                    <div class="well well-sm header">
                        <label class="header-caption">HAPPY BIRTHDAY</label>
                    </div>
                    <?php
                      $date_now_bday   = date('m-d'); 
                      $date_5days      = date('m-d',strtotime("-5 days"));
                      $stmt_bday       = "SELECT * FROM users WHERE DATE_FORMAT(birthdate,'%m-%d') BETWEEN '".$date_5days."' AND '".$date_now_bday."'  ";
                      $query_bday      = mysqli_query($db_conn, $stmt_bday);
                      //echo $date_now_bday;
                      while($row_bday = $query_bday -> fetch_assoc())
                        {
                    ?>
                      <div class="media media-margin">
                        <div class="media-left media-middle">
                          <img src="<?php echo 'users'.$row_bday['picture_path']; ?>" class="media-format media-image" style="height: 35px; width: auto;">
                        </div>
                        <div class="media-body">
                          <h5 class="media-heading">Name:
                            <label class="media-name">&nbsp;
                                  <?php echo $row_bday['first_name'].' '.$row_bday['last_name']; ?>
                            </label></h5>
                          <p class="media-bdate">
                            <sub>
                              Birthdate:&nbsp&nbsp <?php echo $row_bday['birthdate']; ?>
                            </sub>
                          </p>
                        </div>
                      </div>
                      <hr>
                    <?php } ?>
                </div>
                <!--end birthday-->
                 <!--bulletin-->
                
                <div class="row row-bday">
                    <label>IT BULETTIN</label>
                    <div class="list-group">
                     <?php 
                        //publish - left
                        $date_10days   = date('Y-m-d',strtotime("-10 days"));
                        $stmt_bulletin   = "SELECT * FROM publish WHERE pub_type= 'IT BULLETIN' and pub_date BETWEEN '".$date_10days."' AND '".$date_now."'  ";

                        $query_bulletin  = $db_conn -> query($stmt_bulletin);
                            while($row_bulletin = $query_bulletin -> fetch_assoc())
                              {
                      ?>
                      <div href="#" class="list-group-item">
                        <label class="list-group-item-heading bull-hdr">
                            <?php echo $row_bulletin['pub_title']; ?>
                        </label>
                        <p class="list-group-item-text">
                             <?php echo substr($row_bulletin['pub_description'],0,40).'...'; ?>
                        </p>
                      </div>
                    <?php } ?>
                    </div>
                </div>
                <!--end bulletin-->
            </div>
        </div>
    </div>
</body>
</html>
<script type="text/javascript">
   $(document).ready(function(){
    $('[data-toggle="tooltip"]').tooltip(); 
});
</script>