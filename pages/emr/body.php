<!DOCTYPE html>
<html>
<head>
</head>
<body>
	<style type="text/css">
		body{
			font-family: "Century Gothic";
			font-size: 16px;
		}
	

		th{
			text-align: left;
			font-weight: lighter;
			color: #313130;
			
		}

		td{
			font-weight: bold;
			color: #313130;
		}

		.test-margin{
			padding: 0px 2em;
		}

		.header-mg{
			padding-bottom: 20px;
		}

		.title{
			background-color: #ffcc66;
			padding: 5px 0px 5px 5px;
		}

		.disclaimer{
			font-family: "Century Gothic"
			font-weight: lighter;
		}

	</style>
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<img src="cid:logo" class="custom-logo" style="height: 55px; padding-left:200px;  width: auto;">
			</div>
			<?php
				include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

				$stmt   = "SELECT * FROM record WHERE record_id =  ".$_GET["tran_id"]." ";
				$result = mysqli_query($db_conn,$stmt);

				if(mysqli_num_rows($result)>0)
					{
					while($row = mysqli_fetch_array($result))
						{
			?>
				 <table>
				    <tr>
				      <th>Transaction No</th>
				      <td><?php echo ' <span class=\'test-margin\'>:</span> '.$row['record_id']; ?></td>
				    </tr>
				    <tr>
					    <th>Date</th>
    				    <td><?php echo ' <span class=\'test-margin\'>:</span> '.$row['cdate']; ?></td>
				    </tr>
				    <tr>
				      <th class="header-mg">Doctor</th>
				 	  <td class="header-mg"><?php echo ' <span class=\'test-margin\'>:</span> '.$row['doctor_name']; ?></td>
				    </tr>
				    <tr>
	     		      <th colspan="2" class="title">CALLER INFORMATION</th>
				    </tr>	
				    <tr>
				      <th>Name</th>
				 	  <td><?php echo ' <span class=\'test-margin\'>:</span> '.$row['first_name'].' '.$row['last_name']; ?></td>
				    </tr>
				    <tr>
				      <th class="header-mg">Employee No</th>
				 	  <td class="header-mg"><?php echo '<span class=\'test-margin\'>:</span> '.$row['member_no']; ?></td>
				    </tr>
				    <tr>
				      <th colspan="2" class="title">PATIENT INFORMATION</th>
				    </tr>
				     <tr>
				      <th>Name</th>
				 	  <td><?php echo ' <span class=\'test-margin\'>:</span> '.$row['p_first_name'].' '.$row['p_last_name']; ?></td>
				    </tr>
				    <tr>
				      <th>Age</th>
				 	  <td><?php echo ' <span class=\'test-margin\'>:</span> '.$row['p_age']; ?></td>
				    </tr>
				    <tr>
				      <th>Gender</th>
				 	  <td><?php echo ' <span class=\'test-margin\'>:</span> '.$row['p_gender']; ?></td>
				    </tr>
				    <tr>
				      <th>Chief Complaint</th>
				 	  <td><?php echo ' <span class=\'test-margin\'>:</span> '.$row['chief_complaint']; ?></td>
				    </tr>
				    <tr></tr>
				  </table><br><br>
			 <?php 
			     }
				}

			   ?>
			   <table>
			   		<tr>
			   			<center><sub>DISCLAIMER</sub></center>
			   		</tr>
			   		<tr><br></tr>
				    <tr>
				    	<sub>The Health Assessment arising from this Tele-consultation must be considered as a 'Recommendation' ONLY and should not be used to coerce an Employee to report to work or not. This Health Assessment merely determines whether or not an Employee can safely do a specific job or task, and without risk to his own or others' health and safety. It is still primarily the Employee's responsibility to decide and prerogative to follow with the Advice based on the Tele-consultation.</sub>
				    </tr>
			   </table>
		</div>
	</div>
</body>
</html>
