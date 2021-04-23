<div id="modal_symptoms" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header modal-title-symptoms">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<div class="modal-title">
					<strong><h4>CHIEF COMPLAINTS/SYMPTOMS</h4></strong>
				</div>
			</div>
			<div class="modal-body">
				<form class="form-inline" method="POST" action="modal/_new_symptoms.php" id="new_symptoms">
					<div class="input-group">
							<span class="input-group-addon"><i class="glyphicon glyphicon-search"></i></span>
							<input type="text" name="symptoms" id="input_symptoms" placeholder="- Search by Symptoms -"  size="60%" autocomplete="off" class="form-control">
					</div>
					<a href="#" id="new_sym" class="btn btn-emr no-border-radius btn-sm"><i class="glyphicon glyphicon-plus"></i></a><br>
					<h4 align="center">Search Result</h4>
					<div class="table-responsive box-model">
						<table class="table table-bordered table-sm table-hover">
							<thead>
								<tr>
									<th class="header-users">CODE</th>
									<th class="header-users">SYMPTOMS</th>
								</tr>
							</thead>
							<tbody id="result_symptoms"></tbody>
						</table>
					</div>
				</form>	
			</div>
			<div class="modal-footer"></div>
		</div>
	</div>
</div>
<script>
	//add symptoms
	$('#new_sym').click(function(){
		$.ajax({
			url:"modal/_new_symptoms.php",
			method:"POST",
			data: $('#new_symptoms').serialize(),
			success:function(data)
			{
				alert("Success");
				$('#input_symptoms').val('');
			}
		});
	});


$('#input_symptoms').keyup(function(){
	var txt = $(this).val();
	$('#result_symptoms').html('loading');
	if(txt != '')
	{
		$.ajax({
			url:"table/_tbl_symptoms.php",
			method:"GET",
			data:{search:txt},
			dataType:"text",
			success:function(data)
			{
				$('#result_symptoms').html(data);
			}
		});
	}
	else
	{
		$('#result_symptoms').html('');
	}
});
</script>