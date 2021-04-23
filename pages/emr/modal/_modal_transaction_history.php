<div id="modal_transaction_history" class="modal fade" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header modal-title-service_call">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title">
					<strong><h4>MEDICAL RECORD HISTORY</h4></strong>
				</div>
			</div>
			<div class="modal-body">
				<form class="form-inline" method="POST" action="">
					<div class="table-responsive box-model">
						<table class="table table-bordered table-lg table-hover">
							<thead>
								<tr>
									<!--DISPLAY TABLE-->
									<th class="header-users">Transaction ID</th>
									<th class="header-users">Patient Name</th>
									<th class="header-users">Timestamp</th>
									<th class="header-users">Doctor Name</th>
									<th class="header-users">Reason of Call</th>
									<!--DISPLAY CONTENT ON TABLE ROW CONTENT CLICK-->									
								</tr>
							</thead>
							<tbody>
								<?php 
									include $_SERVER['DOCUMENT_ROOT'].'\gti_portal\db\db.php';

									$member_no = $_GET['member_id'];
									$stmt  = "SELECT * FROM record where member_no = '$member_no' ORDER BY record_id DESC "; 
									$query = mysqli_query($db_conn,$stmt);

									while ($row = mysqli_fetch_assoc($query)) {
									echo "<tr>"	;
										echo "<td><a href='#' class='notes'>".$row['record_id']."</td>";
										echo "<td>".$row['p_first_name'].' '.$row['p_last_name']."</td>";
										echo "<td>".$row['cdate'].' '.$row['ctime']."</td>";
										echo "<td>".$row['doctor_name']."</td>";
										echo "<td>".$row['reason_of_call']."</td>";
										echo "<td class='hidden'>".$row['chief_complaint']."</a></td>";
										echo "<td class='hidden'>".$row['presumptive_diagnosis']."</a></td>";
										echo "<td class='hidden'>".$row['secondary_diagnosis']."</a></td>";
										echo "<td class='hidden'>".$row['notes']."</a></td>";
									echo "</tr>";
									}
								?>
							</tbody>
						</table>
					</div>
					<label>Chief Complaint</label>
					<input type="text" class="form-control txtchiefcomplaint" size="119%">
					<br>
					<label>Presumptive Diagnosis</label>
					<textarea type="text" class="form-control txtpresumptivediagnosis" size="119%"></textarea>
					<br>
					<label>Secondary Diagnosis</label>
					<input type="text" class="form-control txtsecondarydiagnosis" size="119%">
					<br>
					<label>Notes</label>
					<textarea type="text" name="notes" class="form-control txtnotes" ></textarea>
				</form>	
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<script>
	$('.notes').click(function(){
		var notes   = $(this).text();
		var chief_complaint         = $(this).closest('td').next().next().next().next().next().text(); 
		var txtpresumptivediagnosis = $(this).closest('td').next().next().next().next().next().next().text(); 
		var txtsecondarydiagnosis   = $(this).closest('td').next().next().next().next().next().next().next().text(); 
		var txtnotes                = $(this).closest('td').next().next().next().next().next().next().next().next().text(); 
		

		$('.txtchiefcomplaint').val(chief_complaint);
		$('.txtpresumptivediagnosis').val(txtpresumptivediagnosis);
		$('.txtsecondarydiagnosis').val(txtsecondarydiagnosis);
		$('.txtnotes').val(txtnotes);
	});
</script>
